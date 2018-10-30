<?php

declare(strict_types=1);

namespace AppBundle\Model;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

class ProjectImport
{
    /**
     * @Assert\File(
     *     mimeTypes={"application/pdf"},
     *      mimeTypesMessage="Įkelkite PDF failą"
     * )
     * @Assert\NotBlank(message="Įkelkite PDF failą")
     */
    private $file;

    public function getFile(): ?File
    {
        return $this->file;
    }

    public function setFile(File $file)
    {
        $this->file = $file;
    }
}