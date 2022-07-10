<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha;


use Illuminate\Support\Facades\File;
use Livewire\Commands\ComponentParser as ComponentParserAlias;
use Illuminate\Support\Str;
use Livewire\Livewire;
use function Livewire\str;

use Symfony\Component\Finder\Finder;

class ComponentParser extends ComponentParserAlias
{


    public static function generatePathFromNamespace($namespace)
    {
        $name = str($namespace)->finish('\\')->replaceFirst(app()->getNamespace(), '');
        return __DIR__ . '/' . str_replace('\\', '/', $name);
    }

    public static function generateMenu($path, $search, $ns = "\\App")
    {
        if (!is_dir($path)) {
            return;
        }
        $menus = [];
        foreach ((new Finder)->in($path) as $component) {
            $componentPath = $component->getRealPath();
            $namespace = Str::after($componentPath, $search);
            $namespace = Str::replace(['/', '.php'], ['\\', ''], $namespace);
            $name = Str::afterLast( $namespace, "\\");
            $component = $ns . $namespace;
            if (class_exists($component)) {
                if (method_exists($component, 'route')) {
                    $cp = app($component);
                    $menus[$cp->path()] = [
                        'icon' => $cp->icon(),
                        'layout' => $name,
                        'slug' => $cp->prefixAndPath(),
                        'route' => $cp->route_name(),
                        'description' => $cp->label(),
                        'name' => Str::replace("/","", $cp->label()),
                    ];
                }
            }

        }
        return $menus;
    }

    public static function generateRoute($path, $search, $ns = "\\App")
    {
        if (!is_dir($path)) {
            return;
        }
        foreach ((new Finder)->in($path) as $component) {
            $componentPath = $component->getRealPath();
            $namespace = Str::after($componentPath, $search);
            $namespace = Str::replace(['/', '.php'], ['\\', ''], $namespace);
            $component = $ns . $namespace;
            if (class_exists($component)) {
                if (method_exists($component, 'route')) {
                    app($component)->route();
                }
            }
        }
    }


    public static function generateComponent($path)
    {
        if (!is_dir($path)) {
            return;
        }
        foreach ((new Finder)->in($path) as $component) {
            $componentPath = $component->getRealPath();
            dd($componentPath);
        }
    }


    public static function generateIcom($path)
    {
        if (!is_dir($path)) {
            return;
        }
        foreach ((new Finder)->in($path) as $component) {
            $componentPath = $component->getRealPath();
            dd($componentPath);
        }
    }
    public static function generateLivewire($path, $search, $ns = "\\App")
    {

        if (!is_dir($path)) {
            return;
        }

        $no = [];
        $yes = [];
        $all = [];
        foreach ((new Finder)->in($path) as $component) {
            $componentPath = $component->getRealPath();
            $namespace = Str::after($componentPath, $search);
            $namespace = str_replace('/', '\\', $namespace);
            $namespace = Str::replaceArray('.php', [''], $namespace);
            $component = $ns . $namespace;

            if (class_exists($component)) {
                if (method_exists(app($component), 'name')) {
                    $alias = app($component)->name();
                } else {
                    $alias = Str::afterLast($component, $search);
                    $alias = Str::lower($alias);
                    $alias = Str::replaceArray('\\', ['.'], $alias);
                }
                $yes[$alias] = $component;
                Livewire::component($alias, $component);
            } else {
                $no[] = $component;
            }
            $all[] = $component;
        }
//        dd($yes, $no, $all);
    }

    protected static function generate($component, $namespace, $reapath)
    {
        return $namespace . str_replace(
                ['/', '.php'],
                ['\\', ''],
                Str::after($component->getRealPath(), $reapath)
            );
    }
}
