<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_aa8ddcc73e69603c548895764f050ef40fa7f56cefcd107fb20eed95423e5f7d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_31ec79f5127826d90be38ba2efc5a05f9e0c2c9c8c6f23964285b9e8f9be559b = $this->env->getExtension("native_profiler");
        $__internal_31ec79f5127826d90be38ba2efc5a05f9e0c2c9c8c6f23964285b9e8f9be559b->enter($__internal_31ec79f5127826d90be38ba2efc5a05f9e0c2c9c8c6f23964285b9e8f9be559b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_31ec79f5127826d90be38ba2efc5a05f9e0c2c9c8c6f23964285b9e8f9be559b->leave($__internal_31ec79f5127826d90be38ba2efc5a05f9e0c2c9c8c6f23964285b9e8f9be559b_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_020373fdf62c77523111f166d065257a51340db962e97ca12b3971ab1e2e3500 = $this->env->getExtension("native_profiler");
        $__internal_020373fdf62c77523111f166d065257a51340db962e97ca12b3971ab1e2e3500->enter($__internal_020373fdf62c77523111f166d065257a51340db962e97ca12b3971ab1e2e3500_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_020373fdf62c77523111f166d065257a51340db962e97ca12b3971ab1e2e3500->leave($__internal_020373fdf62c77523111f166d065257a51340db962e97ca12b3971ab1e2e3500_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_d39ce5e093b92d82fc4635ba40fe723a545511fcaf23729270d60152330fb373 = $this->env->getExtension("native_profiler");
        $__internal_d39ce5e093b92d82fc4635ba40fe723a545511fcaf23729270d60152330fb373->enter($__internal_d39ce5e093b92d82fc4635ba40fe723a545511fcaf23729270d60152330fb373_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_d39ce5e093b92d82fc4635ba40fe723a545511fcaf23729270d60152330fb373->leave($__internal_d39ce5e093b92d82fc4635ba40fe723a545511fcaf23729270d60152330fb373_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_e0312f744c9999192ff5a53a329c56290ca833abe4f5cad0b57b4d8d556e15c1 = $this->env->getExtension("native_profiler");
        $__internal_e0312f744c9999192ff5a53a329c56290ca833abe4f5cad0b57b4d8d556e15c1->enter($__internal_e0312f744c9999192ff5a53a329c56290ca833abe4f5cad0b57b4d8d556e15c1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_e0312f744c9999192ff5a53a329c56290ca833abe4f5cad0b57b4d8d556e15c1->leave($__internal_e0312f744c9999192ff5a53a329c56290ca833abe4f5cad0b57b4d8d556e15c1_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include '@Twig/Exception/exception.html.twig' %}*/
/* {% endblock %}*/
/* */
