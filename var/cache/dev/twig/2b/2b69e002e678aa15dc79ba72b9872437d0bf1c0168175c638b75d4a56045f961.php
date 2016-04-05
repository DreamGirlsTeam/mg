<?php

/* base.html.twig */
class __TwigTemplate_66bae61aa868311e20dc402000cc605d36e407f4759ad702537cc6f9f9c03b86 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_5c4c0a0cdb20a6049188616a5047ec0c2e69e4877858e4a485c9bbf48543fd6f = $this->env->getExtension("native_profiler");
        $__internal_5c4c0a0cdb20a6049188616a5047ec0c2e69e4877858e4a485c9bbf48543fd6f->enter($__internal_5c4c0a0cdb20a6049188616a5047ec0c2e69e4877858e4a485c9bbf48543fd6f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
        
        $__internal_5c4c0a0cdb20a6049188616a5047ec0c2e69e4877858e4a485c9bbf48543fd6f->leave($__internal_5c4c0a0cdb20a6049188616a5047ec0c2e69e4877858e4a485c9bbf48543fd6f_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_e5265cdf54db1cdc3cb57d8d4cb033aa614cf80c8350c7edb5fbd9588ae30c84 = $this->env->getExtension("native_profiler");
        $__internal_e5265cdf54db1cdc3cb57d8d4cb033aa614cf80c8350c7edb5fbd9588ae30c84->enter($__internal_e5265cdf54db1cdc3cb57d8d4cb033aa614cf80c8350c7edb5fbd9588ae30c84_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_e5265cdf54db1cdc3cb57d8d4cb033aa614cf80c8350c7edb5fbd9588ae30c84->leave($__internal_e5265cdf54db1cdc3cb57d8d4cb033aa614cf80c8350c7edb5fbd9588ae30c84_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_279c4f069c178959d503ca86848c8a46df27af64d7584544d78dcd7d2dae8f82 = $this->env->getExtension("native_profiler");
        $__internal_279c4f069c178959d503ca86848c8a46df27af64d7584544d78dcd7d2dae8f82->enter($__internal_279c4f069c178959d503ca86848c8a46df27af64d7584544d78dcd7d2dae8f82_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_279c4f069c178959d503ca86848c8a46df27af64d7584544d78dcd7d2dae8f82->leave($__internal_279c4f069c178959d503ca86848c8a46df27af64d7584544d78dcd7d2dae8f82_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_eb690022848cb3224bb866dbdb8bfe9b243083db7efeed3c52089bd607c31865 = $this->env->getExtension("native_profiler");
        $__internal_eb690022848cb3224bb866dbdb8bfe9b243083db7efeed3c52089bd607c31865->enter($__internal_eb690022848cb3224bb866dbdb8bfe9b243083db7efeed3c52089bd607c31865_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_eb690022848cb3224bb866dbdb8bfe9b243083db7efeed3c52089bd607c31865->leave($__internal_eb690022848cb3224bb866dbdb8bfe9b243083db7efeed3c52089bd607c31865_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_72da9eaa509383e75de053078b3c9a83f61c2e533c50ec643392cfd7a35aebba = $this->env->getExtension("native_profiler");
        $__internal_72da9eaa509383e75de053078b3c9a83f61c2e533c50ec643392cfd7a35aebba->enter($__internal_72da9eaa509383e75de053078b3c9a83f61c2e533c50ec643392cfd7a35aebba_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_72da9eaa509383e75de053078b3c9a83f61c2e533c50ec643392cfd7a35aebba->leave($__internal_72da9eaa509383e75de053078b3c9a83f61c2e533c50ec643392cfd7a35aebba_prof);

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
        return array (  93 => 11,  82 => 10,  71 => 6,  59 => 5,  50 => 12,  47 => 11,  45 => 10,  38 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <title>{% block title %}Welcome!{% endblock %}</title>*/
/*         {% block stylesheets %}{% endblock %}*/
/*         <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/*     </head>*/
/*     <body>*/
/*         {% block body %}{% endblock %}*/
/*         {% block javascripts %}{% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
