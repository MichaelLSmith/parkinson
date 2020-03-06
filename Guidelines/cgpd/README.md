# Fabric

Fabric is a WordPress starter theme develop by [Floating-Point](https://floating-point.com).

## Features / Technologies

-   [Webpack](https://webpack.js.org/) for compiling and bundling
-   [Sass](https://sass-lang.com/)
-   [Babel](https://babeljs.io/) for modern javascript
-   [Bootstrap](https://getbootstrap.com/)

## Requirements

-   [WordPress](https://wordpress.org/) >= 5.0
-   [PHP](https://secure.php.net/manual/en/install.php) >= 7.1.3
-   [Composer](https://getcomposer.org/download/)
-   [Git](https://git-scm.com/)
-   [Node.js](http://nodejs.org/) >= 8.0.0
-   [Yarn](https://yarnpkg.com/en/docs/install)

## Installation

Install by cloning this repository, replacing `theme-name` with your theme name.

```shell
$ git clone git@gitlab.com:floatingpoint/fp-theme.git theme-name
```

Replace the theme name in the stylesheet found in `assets/scss/index.scss` with your theme name.

CD into the theme directory and install the dependencies use `composer`.

```shell
$ cd your-theme
$ composer install
```

## Structure

```shell
themes/your-theme/          # -> Root of the theme
|--- app/                   # -> Theme PHP
|  |--- Components/         # -> Theme components / Template Tags
|  |--- Interfaces/         # -> Interfaces required by Components
|  |--- Repositories/       # -> Theme reporistories (do not edit)
|  |--- Support/            # -> Support classes
|  |--- Widgets/            # -> Custom WordPress widgets
|  |--- functions.php       # -> Theme object setup
|  |--- TemplateTags.php    # -> Do not edit
|  |--- Theme.php           # -> Theme class and component setup
|--- assets/                # -> Frontend assets
|  |--- build/              # -> Build configurations
|  |--- fonts/              # -> Theme fonts
|  |--- img/                # -> Theme images
|  |--- js/                 # -> Theme JS
|  |--- scss/               # -> Theme styles
|--- config/                # -> Theme Configuration files
|--- dist/                  # -> Bundled theme assets (do not edit)
|--- node_modules/          # -> Node dependencies (do not edit)
|--- templates/             # -> Wordpress theme files
|  |--- page-parts/         # -> Page parts used in templates ${slug}-${position}.php
|  |--- page-templates/     # -> Custom WordPress templates
|  |--- template-parts/     # -> Theme template parts
|--- vendor/                # -> Composer packages (do not edit)
|--- .babelrc               # -> Babel configuration
|--- .browserlistrc         # -> Browser support configuration
|--- .editorconfig          # -> Editor formatting rules
|--- .eslintignore          # -> Files to ignore for eslint rules
|--- .eslintrc              # -> ESLint rules
|--- .gitignore             # -> Git ignore list
|--- composer.json          # -> Autoloading for `src/` files + composer dependencies
|--- componser.lock         # -> Composer lock file (do not edit)
|--- package.json           # -> Node depenency list
|--- postcss.config.js      # -> PostCSS configuration
|--- screenshot.png         # -> Theme screenshot for WordPress
|--- yarn.lock              # -> Yarn lock file (do not edit)
```

## Setup

Edit the config files in `config` to update the theme colours, social media url links and add any additional files / keys. When adding a file remember to load it in `src\Components\Config.php`.

Access the configuration by using the template tag `Fp\Fabric\config('key')`;

## Development

Run `yarn` within the theme directory to install node dependencies

### Build Scripts

* `yarn start` - Compile frontend assets and watch files for changes
* `yarn build` - Compile, optimize and bundle frontend assets for production

## Deployment

Before deplyment, remember to do the following to publish the production ready theme,.

* `yarn build` - Generate otimized frontend assets
* `rm -rf node_modules` - Remove unecessary development depenedencies
