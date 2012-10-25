# Simple

Very lightweight MVC Framework. Not intended to provide a full stack framework, only the basic commands. The template engine is the popular PHP project Twig. I choose to not use an ORM because it would add a lot of complexity to the project and that wasn’t the goal.

## Kickstart

### Config

Use the config file (config.php) to set your database connection (if any) and make sure the PATH_BASE constant is well defined.

### Routes

You must use routes to translate urls to controllers. Add all the routes you need to the routes.php file.

    $router->addRoute(new Route(‘/some/url/:with/:params’, ‘controllername’, ‘actioname’));

### Modules

The framework is based on modules. Everything is organised as a module. Each module contains their own templates, controller, and other libs. A module looks like this:

    App/

         ModuleName/

             Controller.php

             templates/

                 template.html.twig

### Controller

The matched route will call the controller that was found. Your controller is responsible to pass variables to the view. To access the view simply use _$this->view_ in each action.

### View

The view uses Twig so read the doc of Twig.
