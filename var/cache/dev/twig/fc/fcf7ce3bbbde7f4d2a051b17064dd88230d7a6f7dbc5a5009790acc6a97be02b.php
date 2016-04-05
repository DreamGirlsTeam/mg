<?php

/* base.html.twig */
class __TwigTemplate_ca1f26823c99117c015b421facf673779dd6dc7e32172cc30506091a4deecc4e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_799317dd0ec2d6643ab27ffbb8832f43e8cc3aa36699c0fbfe68a85668936cfb = $this->env->getExtension("native_profiler");
        $__internal_799317dd0ec2d6643ab27ffbb8832f43e8cc3aa36699c0fbfe68a85668936cfb->enter($__internal_799317dd0ec2d6643ab27ffbb8832f43e8cc3aa36699c0fbfe68a85668936cfb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>Medicine Guide</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 9
        echo "    </head>
    <body>
        ";
        // line 11
        $this->displayBlock('body', $context, $blocks);
        // line 12
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 13
        echo "    </body>
</html>
";
        
        $__internal_799317dd0ec2d6643ab27ffbb8832f43e8cc3aa36699c0fbfe68a85668936cfb->leave($__internal_799317dd0ec2d6643ab27ffbb8832f43e8cc3aa36699c0fbfe68a85668936cfb_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_728f47b2b7e34a6b49d280b9a2a5a611d44187b33ad1541d0d544dc7aa2ecbf3 = $this->env->getExtension("native_profiler");
        $__internal_728f47b2b7e34a6b49d280b9a2a5a611d44187b33ad1541d0d544dc7aa2ecbf3->enter($__internal_728f47b2b7e34a6b49d280b9a2a5a611d44187b33ad1541d0d544dc7aa2ecbf3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 7
        echo "
        ";
        
        $__internal_728f47b2b7e34a6b49d280b9a2a5a611d44187b33ad1541d0d544dc7aa2ecbf3->leave($__internal_728f47b2b7e34a6b49d280b9a2a5a611d44187b33ad1541d0d544dc7aa2ecbf3_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_f9c9e9502c80921cc33c1afadebb603d05aaf7c7efe67cb280c7067ad1be8807 = $this->env->getExtension("native_profiler");
        $__internal_f9c9e9502c80921cc33c1afadebb603d05aaf7c7efe67cb280c7067ad1be8807->enter($__internal_f9c9e9502c80921cc33c1afadebb603d05aaf7c7efe67cb280c7067ad1be8807_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_f9c9e9502c80921cc33c1afadebb603d05aaf7c7efe67cb280c7067ad1be8807->leave($__internal_f9c9e9502c80921cc33c1afadebb603d05aaf7c7efe67cb280c7067ad1be8807_prof);

    }

    // line 12
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_94dc8eae3fe1c35778fa3ded74d085438ced67a0f516418e70bac2b74608c407 = $this->env->getExtension("native_profiler");
        $__internal_94dc8eae3fe1c35778fa3ded74d085438ced67a0f516418e70bac2b74608c407->enter($__internal_94dc8eae3fe1c35778fa3ded74d085438ced67a0f516418e70bac2b74608c407_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_94dc8eae3fe1c35778fa3ded74d085438ced67a0f516418e70bac2b74608c407->leave($__internal_94dc8eae3fe1c35778fa3ded74d085438ced67a0f516418e70bac2b74608c407_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  77 => 12,  66 => 11,  58 => 7,  52 => 6,  43 => 13,  40 => 12,  38 => 11,  34 => 9,  32 => 6,  25 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <title>Medicine Guide</title>*/
/*         {% block stylesheets %}*/
/* */
/*         {% endblock %}*/
/*     </head>*/
/*     <body>*/
/*         {% block body %}{% endblock %}*/
/*         {% block javascripts %}{% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
