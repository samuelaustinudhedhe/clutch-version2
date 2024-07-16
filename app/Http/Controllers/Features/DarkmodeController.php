<?php

namespace App\Http\Controllers\Features;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DarkmodeController extends Controller
{

    /**
     * Generate the HTML attributes and Alpine.js directives for enabling dark mode.
     *
     * @param bool $class Whether to include additional classes for styling. Default is true.
     * @param bool $echo Whether to echo the generated HTML or return it as a string. Default is true.
     * @return string|null If $echo is true, returns null. Otherwise, returns the generated HTML as a string.
     */
    public static final function on(bool $class = true, bool $echo = true)
    {
        // Generate the Alpine.js directives and HTML attributes for dark mode functionality
        $xData = '{
            selectedTheme: localStorage.getItem(\'theme\') || \'system\',
            initializeTheme() {
                this.applyTheme(this.selectedTheme);
                window.addEventListener(\'storage\', (event) => {
                    if (event.key === \'theme\') {
                        this.applyTheme(event.newValue);
                    }
                });
                window.matchMedia(\'(prefers-color-scheme: dark)\').addEventListener(\'change\', (event) => {
                    if (this.selectedTheme === \'system\') {
                        this.applyTheme(\'system\');
                    }
                });
            },
            applyTheme(theme) {
                this.selectedTheme = theme;
                if (this.selectedTheme === \'system\') {
                    this.theme = window.matchMedia(\'(prefers-color-scheme: dark)\').matches ? \'dark\' : \'light\';
                } else {
                    this.theme = this.selectedTheme;
                }
                document.documentElement.classList.toggle(\'dark\', this.theme === \'dark\');
                localStorage.setItem(\'theme\', this.selectedTheme);
            },
            setTheme(theme) {
                this.applyTheme(theme);
                window.dispatchEvent(new CustomEvent(\'theme-change\', { detail: this.selectedTheme }));
            }
        }';

        $data = 'x-data="' . remove_whitespace($xData) . '" x-init="initializeTheme()" @theme-change.window="applyTheme($event.detail)" x-cloak ';

        // Additional classes for styling based on dark mode
        $class = $class ? 'class="h-full bg-gray-100 dark:bg-gray-900"' : '';

        // If $echo is true, echo the generated HTML; otherwise, return it as a string
        if ($echo) {
            echo $class . $data;
            return null;
        } else {
            return $class . $data;
        }
    }

    /**
     * Generate the HTML for the dark mode switch component.
     *
     * @return string The HTML for the dark mode switch.
     */
    public static function switch()
    {
        // Render the dark mode switch component view and return the HTML
        return view('components.darkmode.switch')->render();
    }

    /**
     * Generate the HTML for the dark mode button component.
     *
     * @return string The HTML for the dark mode switch.
     */
    public static function button()
    {
        // Render the dark mode switch component view and return the HTML
        return view('components.darkmode.button')->render();
    }

    /**
     * Generate the HTML for the dark mode modal popup component.
     *
     * @return string The HTML for the dark mode modal.
     */
    public static function modal()
    {
        // Render the dark mode modal component view and return the HTML
        return view('components.darkmode.modal')->render();
    }
}
