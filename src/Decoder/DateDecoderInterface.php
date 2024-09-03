<?php

namespace Genkgo\Camt\Decoder;

use DateTimeImmutable;

interface DateDecoderInterface
{
    public function decode($date);
}
