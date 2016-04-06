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
        $__internal_6c6536b48cec91e3830d0eadc90a5a1cc99e6c3a9ac5034d142ee2d82c22a7f7 = $this->env->getExtension("native_profiler");
        $__internal_6c6536b48cec91e3830d0eadc90a5a1cc99e6c3a9ac5034d142ee2d82c22a7f7->enter($__internal_6c6536b48cec91e3830d0eadc90a5a1cc99e6c3a9ac5034d142ee2d82c22a7f7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

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
        
        $__internal_6c6536b48cec91e3830d0eadc90a5a1cc99e6c3a9ac5034d142ee2d82c22a7f7->leave($__internal_6c6536b48cec91e3830d0eadc90a5a1cc99e6c3a9ac5034d142ee2d82c22a7f7_prof);

    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        $__internal_be1f30b3bd6269e6123e9e67d9a17a0a39f7a6357b37440f27e1e8f54acd1e83 = $this->env->getExtension("native_profiler");
        $__internal_be1f30b3bd6269e6123e9e67d9a17a0a39f7a6357b37440f27e1e8f54acd1e83->enter($__internal_be1f30b3bd6269e6123e9e67d9a17a0a39f7a6357b37440f27e1e8f54acd1e83_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_be1f30b3bd6269e6123e9e67d9a17a0a39f7a6357b37440f27e1e8f54acd1e83->leave($__internal_be1f30b3bd6269e6123e9e67d9a17a0a39f7a6357b37440f27e1e8f54acd1e83_prof);

    }

    // line 10
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_f50843fe1e89d25f530b4a27dc5b1fe4ef34de9e795731e2febfeeadbd962cfb = $this->env->getExtension("native_profiler");
        $__internal_f50843fe1e89d25f530b4a27dc5b1fe4ef34de9e795731e2febfeeadbd962cfb->enter($__internal_f50843fe1e89d25f530b4a27dc5b1fe4ef34de9e795731e2febfeeadbd962cfb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_f50843fe1e89d25f530b4a27dc5b1fe4ef34de9e795731e2febfeeadbd962cfb->leave($__internal_f50843fe1e89d25f530b4a27dc5b1fe4ef34de9e795731e2febfeeadbd962cfb_prof);

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
