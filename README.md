Adamsmeat/Output
================

Backend output manager for the browser

## Configuration

Merge ['Adamsmeat\Output\OutputServiceProvider'] into Config::get('app.providers').
Merge ['Output' => 'Adamsmeat\Output\OutputFacade'] into Config::get('app.aliases').

### Usage

Chain the following methods to return Illuminate\View\View object

- setTheme() No need to call if you did not create any new theme.
- cfg() When you need to modify this's packages config by passing an array.
- sendView() returns the final view based off runtime config

## Global variables

Access in view files through the g('key') or Output::g(key) function which is the array set in output::config file with key 'globals'.

It can be access through $g array but to eliminate errors, escaping, etc, we will use helper functions

### Notes

1. *keys* - avoid special characters(.,-) on identifiers that are meant to be names of variable, functions, etc.
2. *namespace* - keep namespacing at all times if possible, if one can be placed under a category, by all means, do so
