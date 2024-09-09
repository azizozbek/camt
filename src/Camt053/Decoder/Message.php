<?php

namespace Genkgo\Camt\Camt053\Decoder;

use Genkgo\Camt\Decoder\Message as BaseMessageDecoder;
use Genkgo\Camt\Camt053\DTO as Camt053DTO;
use Genkgo\Camt\DTO;
use SimpleXMLElement;
use DateTimeImmutable;
use Genkgo\Camt\Iban;

class Message extends BaseMessageDecoder
{
    /**
     * @param DTO\Message      $message
     * @param SimpleXMLElement $document
     */
    public function addRecords(DTO\Message $message, SimpleXMLElement $document)
    {
        $statements = [];

        $xmlStatements = $this->getRootElement($document)->Stmt;
        foreach ($xmlStatements as $xmlStatement) {
            $statement = new Camt053DTO\Statement(
                (string) $xmlStatement->Id,
                $this->dateDecoder->decode((string) $xmlStatement->CreDtTm),
                $this->getAccount($xmlStatement)
            );

            if (isset($xmlStatement->StmtPgntn)) {
                $statement->setPagination(new DTO\Pagination(
                    (string) $xmlStatement->StmtPgntn->PgNb,
                    ('true' === (string) $xmlStatement->StmtPgntn->LastPgInd) ? true : false
                ));
            }

            if (isset($xmlStatement->AddtlStmtInf)) {
                $statement->setAdditionalInformation((string) $xmlStatement->AddtlStmtInf);
            }

            $this->addCommonRecordInformation($statement, $xmlStatement);
            $this->recordDecoder->addBalances($statement, $xmlStatement);
            $this->recordDecoder->addEntries($statement, $xmlStatement);

            $statements[] = $statement;
        }

        $message->setRecords($statements);
    }

    /**
     * {@inheritdoc}
     */
    public function getRootElement(SimpleXMLElement $document)
    {
        return $document->BkToCstmrStmt;
    }

    /**
     * @param SimpleXMLElement $xmlRecord
     *
     * @return DTO\Account
     */
    protected function getAccount(SimpleXMLElement $xmlRecord)
    {
        if (isset($xmlRecord->Acct->Id->IBAN)) {
            $ibanAccount = new DTO\IbanAccount(new Iban((string) $xmlRecord->Acct->Id->IBAN));

            if (isset($xmlRecord->Acct->Svcr)) {
                $servicer = new DTO\Servicer($xmlRecord->Acct->Svcr->FinInstnId->BIC);
                $servicer->setName($xmlRecord->Acct->Svcr->FinInstnId->Nm);

                if (isset($xmlRecord->Acct->Svcr->FinInstnId->Othr)) {
                    $otherAccount = new DTO\OtherAccount((string) $xmlRecord->Acct->Svcr->FinInstnId->Othr->Id);
                    if (isset($xmlOtherIdentification->Issr)) {
                        $otherAccount->setIssuer($xmlRecord->Acct->Svcr->FinInstnId->Othr->Issr);
                    }
                    $servicer->setOtherAccount($otherAccount);
                }
                $ibanAccount->setServicer($servicer);
            }

            return $ibanAccount;
        }

        $xmlOtherIdentification = $xmlRecord->Acct->Id->Othr;
        $otherAccount = new DTO\OtherAccount((string) $xmlOtherIdentification->Id);

        if (isset($xmlOtherIdentification->SchmeNm)) {
            if (isset($xmlOtherIdentification->SchmeNm->Cd)) {
                $otherAccount->setSchemeName((string) $xmlOtherIdentification->SchmeNm->Cd);
            }

            if (isset($xmlOtherIdentification->SchmeNm->Prtry)) {
                $otherAccount->setSchemeName((string) $xmlOtherIdentification->SchmeNm->Prtry);
            }
        }

        if (isset($xmlOtherIdentification->Issr)) {
            $otherAccount->setIssuer($xmlOtherIdentification->Issr);
        }

        return $otherAccount;
    }
}
