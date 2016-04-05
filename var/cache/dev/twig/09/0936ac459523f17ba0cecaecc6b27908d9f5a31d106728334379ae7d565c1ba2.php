<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_0bc6f31c89072500fb167f9626f4c4bafe9bdd3e0c56b970d2edd535f2fcab82 extends Twig_Template
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
        $__internal_53173703bc43f2d1e61ad4db49f6707cf85d4a2cfcaa68a95a3aada346372500 = $this->env->getExtension("native_profiler");
        $__internal_53173703bc43f2d1e61ad4db49f6707cf85d4a2cfcaa68a95a3aada346372500->enter($__internal_53173703bc43f2d1e61ad4db49f6707cf85d4a2cfcaa68a95a3aada346372500_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_53173703bc43f2d1e61ad4db49f6707cf85d4a2cfcaa68a95a3aada346372500->leave($__internal_53173703bc43f2d1e61ad4db49f6707cf85d4a2cfcaa68a95a3aada346372500_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_08423a51982c565ef4ae4280fd47f283df4eea29188f4a8180feff136f4e42b7 = $this->env->getExtension("native_profiler");
        $__internal_08423a51982c565ef4ae4280fd47f283df4eea29188f4a8180feff136f4e42b7->enter($__internal_08423a51982c565ef4ae4280fd47f283df4eea29188f4a8180feff136f4e42b7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_08423a51982c565ef4ae4280fd47f283df4eea29188f4a8180feff136f4e42b7->leave($__internal_08423a51982c565ef4ae4280fd47f283df4eea29188f4a8180feff136f4e42b7_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_fb689e209ede17210419806f44919d54a23af7d3debf7b279201e543a2e5360a = $this->env->getExtension("native_profiler");
        $__internal_fb689e209ede17210419806f44919d54a23af7d3debf7b279201e543a2e5360a->enter($__internal_fb689e209ede17210419806f44919d54a23af7d3debf7b279201e543a2e5360a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_fb689e209ede17210419806f44919d54a23af7d3debf7b279201e543a2e5360a->leave($__internal_fb689e209ede17210419806f44919d54a23af7d3debf7b279201e543a2e5360a_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_ec85ce080ab72b42bb09be0135014ca1d3678f6ad3beddf539705b521bebc5ce = $this->env->getExtension("native_profiler");
        $__internal_ec85ce080ab72b42bb09be0135014ca1d3678f6ad3beddf539705b521bebc5ce->enter($__internal_ec85ce080ab72b42bb09be0135014ca1d3678f6ad3beddf539705b521bebc5ce_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_ec85ce080ab72b42bb09be0135014ca1d3678f6ad3beddf539705b521bebc5ce->leave($__internal_ec85ce080ab72b42bb09be0135014ca1d3678f6ad3beddf539705b521bebc5ce_prof);

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
