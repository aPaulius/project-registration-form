<?php

declare(strict_types=1);

namespace spec\AppBundle\Model;

use AppBundle\Model\ProjectImport;
use PhpSpec\ObjectBehavior;
use Symfony\Component\HttpFoundation\File\File;

class ProjectImportSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ProjectImport::class);
    }

    function it_should_set_file(File $file)
    {
        $this->setFile($file);
        $this->getFile()->shouldReturn($file);
    }
}
