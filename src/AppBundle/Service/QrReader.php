<?php

declare(strict_types=1);

namespace AppBundle\Service;

use Zxing\QrReader as ZxingQrReader;

class QrReader
{
    public function readFromPdf(string $fileName)
    {
        $image = new \Imagick($fileName.'[0]');
        $image->setImageFormat('png');

        $qr = new ZxingQrReader($image, ZxingQrReader::SOURCE_TYPE_BLOB);
        $text = $qr->text();

        $image->clear();

        return $text;
    }
}