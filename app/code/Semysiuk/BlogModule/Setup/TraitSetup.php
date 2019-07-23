<?php

namespace Semysiuk\BlogModule\Setup;

/**
 * Trait TraitSetup
 *
 * @package Semysiuk\BlogModule\Setup
 */
trait TraitSetup
{
    /**
     * Retrieve the contents of the specified file.
     *
     * @param string $file file to include
     *
     * @return string
     *
     * @throws \Exception
     */
    public function getIncludeFile($file)
    {
        if (!file_exists($file)) {
            throw new \Exception(sprintf('The file "%s" does not exist.', $file));
        }

        return file_get_contents($file);
    }
}
