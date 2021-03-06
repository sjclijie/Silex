<?php

/*
 * This file is part of the Silex framework.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Silex\Provider\Translation;

use Pimple\Container;
use Symfony\Component\Translation\Translator as BaseTranslator;
use Symfony\Component\Translation\MessageSelector;

/**
 * Translator that gets the current locale from the container.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class Translator extends BaseTranslator
{
    protected $app;

    public function __construct(Container $app, MessageSelector $selector)
    {
        $this->app = $app;

        parent::__construct(null, $selector);
    }

    public function getLocale()
    {
        return $this->app['locale'];
    }

    public function setLocale($locale)
    {
        $this->app['locale'] = $locale;

        parent::setLocale($locale);
    }
}
