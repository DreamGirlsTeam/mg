<?php

/* base.html.twig */
class __TwigTemplate_21cde615bf607d98d008c39495d3e1376a07e1bfc842cb64a1ce07016473566b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_983fa12bd01279c5d7912d13e9fc983905aad0543837784082ca81f75d0ee15c = $this->env->getExtension("native_profiler");
        $__internal_983fa12bd01279c5d7912d13e9fc983905aad0543837784082ca81f75d0ee15c->enter($__internal_983fa12bd01279c5d7912d13e9fc983905aad0543837784082ca81f75d0ee15c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>Medicine Guide</title>
        <link href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/styles.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
    </head>
    <body>
        ";
        // line 9
        $this->displayBlock('body', $context, $blocks);
        // line 10
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 11
        echo "    </body>
</html>
";
        
        $__internal_983fa12bd01279c5d7912d13e9fc983905aad0543837784082ca81f75d0ee15c->leave($__internal_983fa12bd01279c5d7912d13e9fc983905aad0543837784082ca81f75d0ee15c_prof);

    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        $__internal_6ccd5daa70bbf9f233200a54c624e3b8f2015745a117b65baabf482846d4262f = $this->env->getExtension("native_profiler");
        $__internal_6ccd5daa70bbf9f233200a54c624e3b8f2015745a117b65baabf482846d4262f->enter($__internal_6ccd5daa70bbf9f233200a54c624e3b8f2015745a117b65baabf482846d4262f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_6ccd5daa70bbf9f233200a54c624e3b8f2015745a117b65baabf482846d4262f->leave($__internal_6ccd5daa70bbf9f233200a54c624e3b8f2015745a117b65baabf482846d4262f_prof);

    }

    // line 10
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_5c3fb8321446ac49d900ae509dc4ae2870e4ae344ec35968c0fc758062160793 = $this->env->getExtension("native_profiler");
        $__internal_5c3fb8321446ac49d900ae509dc4ae2870e4ae344ec35968c0fc758062160793->enter($__internal_5c3fb8321446ac49d900ae509dc4ae2870e4ae344ec35968c0fc758062160793_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_5c3fb8321446ac49d900ae509dc4ae2870e4ae344ec35968c0fc758062160793->leave($__internal_5c3fb8321446ac49d900ae509dc4ae2870e4ae344ec35968c0fc758062160793_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 10,  51 => 9,  42 => 11,  39 => 10,  37 => 9,  31 => 6,  24 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <title>Medicine Guide</title>*/
/*         <link href="{{ asset('bundles/framework/css/styles.css') }}" rel="stylesheet" />*/
/*     </head>*/
/*     <body>*/
/*         {% block body %}{% endblock %}*/
/*         {% block javascripts %}{% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
