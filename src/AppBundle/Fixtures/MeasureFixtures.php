<?php

declare(strict_types=1);

namespace AppBundle\Fixtures;

use AppBundle\Entity\Measure;
use AppBundle\Entity\MeasureValue;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class MeasureFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $measure1 = new Measure('saulės');
        $measure2 = new Measure('vėjo');
        $measure3 = new Measure('geoterminės energijos');
        $measure4 = new Measure('biokuro');

        $measureValue1 = new MeasureValue('saulės priemonė 1', 1000);
        $measureValue2 = new MeasureValue('saulės priemonė 2', 2000);
        $measureValue3 = new MeasureValue('vėjo priemonė 1', 3000);
        $measureValue4 = new MeasureValue('geometrinės energijos priemonė 1', 4000);
        $measureValue5 = new MeasureValue('biokuro priemonė 1', 5000);
        $measureValue6 = new MeasureValue('biokuro priemonė 2', 6000);
        $measureValue7 = new MeasureValue('biokuro priemonė 3', 7000);

        $measure1->addMeasureValue($measureValue1);
        $measure1->addMeasureValue($measureValue2);
        $measure2->addMeasureValue($measureValue3);
        $measure3->addMeasureValue($measureValue4);
        $measure4->addMeasureValue($measureValue5);
        $measure4->addMeasureValue($measureValue6);
        $measure4->addMeasureValue($measureValue7);

        $manager->persist($measure1);
        $manager->persist($measure2);
        $manager->persist($measure3);
        $manager->persist($measure4);

        $manager->flush();
    }
}