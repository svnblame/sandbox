<?php

namespace App\Models\AdvancedFeatures;

use App\Models\AdvancedFeatures\Exceptions\ConfException;
use App\Models\AdvancedFeatures\Exceptions\FileException;
use App\Models\AdvancedFeatures\Exceptions\XmlException;
use Exception;

class ConfManager
{
    /**
     * @throws FileException
     * @throws ConfException
     * @throws XmlException
     */
    public static function init(): array
    {
        try {
            $results = [];
            $conf = new Conf(config_path('users.xml'));
            $results['user'] = $conf->get('user');
            $results['host'] = $conf->get('host');

            $conf->set('pass', 'boofaazaa');
            $conf->write();

            return $results;
        } catch (FileException $e) {
            // permissions issue or non-existent file
            throw $e;
        } catch (XmlException $e) {
            // broken xml
            throw $e;
        } catch (ConfException $e) {
            // wrong kind of XML file
            throw $e;
        } catch (Exception $e) {
            // backstop: should not be called
            throw $e;
        }
    }
}
