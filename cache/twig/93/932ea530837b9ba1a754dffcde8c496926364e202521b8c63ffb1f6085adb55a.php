<?php

/* home.twig */
class __TwigTemplate_e588ae4f9787af112b4d221da7b63d8ff51967b23b5dd01a28f0d4dd78aef6ce extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html>
<head>
    <meta charset=\"utf-8\"/>
    <title>Slim 3</title>
    <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
    <link href='";
        // line 6
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/css/style.css' rel='stylesheet' type='text/css'>
</head>
<body>
<h1>Slim</h1>
<div>
    <p>a microframework for PHP</p>
    <p>";
        // line 12
        echo twig_escape_filter($this->env, ($context["status"] ?? null), "html", null, true);
        echo "</p>
    <h3>The todo</h3>
    <p>";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["todo"] ?? null), "name", array()), "html", null, true);
        echo "</p>
</div>
</body>
</html>

";
    }

    public function getTemplateName()
    {
        return "home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 14,  39 => 12,  30 => 6,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<html>
<head>
    <meta charset=\"utf-8\"/>
    <title>Slim 3</title>
    <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
    <link href='{{ base_url() }}/css/style.css' rel='stylesheet' type='text/css'>
</head>
<body>
<h1>Slim</h1>
<div>
    <p>a microframework for PHP</p>
    <p>{{ status }}</p>
    <h3>The todo</h3>
    <p>{{ todo.name }}</p>
</div>
</body>
</html>

", "home.twig", "/home/shady/Documents/tutorials/slim/templates/home.twig");
    }
}
