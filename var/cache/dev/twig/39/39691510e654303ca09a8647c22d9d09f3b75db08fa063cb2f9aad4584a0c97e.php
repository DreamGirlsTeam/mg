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
        $__internal_896e01f059c845ea974e057212d10ae38d98ef0cab6ec9d3f5a56f817633cdeb = $this->env->getExtension("native_profiler");
        $__internal_896e01f059c845ea974e057212d10ae38d98ef0cab6ec9d3f5a56f817633cdeb->enter($__internal_896e01f059c845ea974e057212d10ae38d98ef0cab6ec9d3f5a56f817633cdeb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

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
        
        $__internal_896e01f059c845ea974e057212d10ae38d98ef0cab6ec9d3f5a56f817633cdeb->leave($__internal_896e01f059c845ea974e057212d10ae38d98ef0cab6ec9d3f5a56f817633cdeb_prof);

    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        $__internal_fde77fe535a7b6916ccf153dce4df46397134190b90e9db62caff63c6b93d710 = $this->env->getExtension("native_profiler");
        $__internal_fde77fe535a7b6916ccf153dce4df46397134190b90e9db62caff63c6b93d710->enter($__internal_fde77fe535a7b6916ccf153dce4df46397134190b90e9db62caff63c6b93d710_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_fde77fe535a7b6916ccf153dce4df46397134190b90e9db62caff63c6b93d710->leave($__internal_fde77fe535a7b6916ccf153dce4df46397134190b90e9db62caff63c6b93d710_prof);

    }

    // line 10
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_c03b6c0917fbb79e62f3852b8bd866b935d29c440024c478e2da405e159546ab = $this->env->getExtension("native_profiler");
        $__internal_c03b6c0917fbb79e62f3852b8bd866b935d29c440024c478e2da405e159546ab->enter($__internal_c03b6c0917fbb79e62f3852b8bd866b935d29c440024c478e2da405e159546ab_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_c03b6c0917fbb79e62f3852b8bd866b935d29c440024c478e2da405e159546ab->leave($__internal_c03b6c0917fbb79e62f3852b8bd866b935d29c440024c478e2da405e159546ab_prof);

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
