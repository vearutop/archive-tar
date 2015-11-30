<?php

namespace Mishak\ArchiveTar\Tests;

use Mishak\ArchiveTar\Reader;

class ArchiveTarTest extends \PHPUnit_Framework_TestCase
{
    public function testTarGz() {
        $this->readArchive(__DIR__ . '/test.tar.gz');
    }

    public function testTarBz2() {
        // TODO broken with "bzopen(): 'rb' is not a valid mode for bzopen(). Only 'w' and 'r' are supported."
        //$this->readArchive(__DIR__ . '/test.tar.bz2');
    }

    public function testTar() {
        $this->readArchive(__DIR__ . '/test.tar');
    }

    private function readArchive($filename) {
        $reader = new Reader($filename);
        //$reader = new \Mishak\ArchiveTar\Reader($filename);
        $reader->setReadContents(false);
        $reader->setBuffer(1000000);
        $count = 0;
        foreach ($reader as $record) {
            if (in_array($record['type'], array(Reader::REGULAR, Reader::AREGULAR), TRUE)) {
                //var_dump($record['filename']);
                ++$count;
            }
        }
        $reader->setReadContents(true);
        $this->count = $count;


        foreach ($reader as $record) {
            if (in_array($record['type'], array(Reader::REGULAR, Reader::AREGULAR), TRUE)) {
            }
        }

    }
}