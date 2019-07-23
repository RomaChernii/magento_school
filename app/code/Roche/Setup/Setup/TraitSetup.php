<?php
/**
 * Roche Setup trait for use in Install/Upgrade Data
 *
 * @category  Roche
 * @package   Roche\Setup
 * @author    Roman Chernii <roche@smile.fr>
 * @copyright 2019 Smile
 */
namespace Roche\Setup\Setup;

/**
 * Trait TraitSetup
 *
 * @package Roche\Setup\Setup
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
