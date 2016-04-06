<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_b268b34f3ba07aa32fee9a50356c19d030736adf34ca489762f2022deff68ce4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e537106021cfc93ba8adf09a2c3ffa2169df560576ed4b0e428d1e4e6352f432 = $this->env->getExtension("native_profiler");
        $__internal_e537106021cfc93ba8adf09a2c3ffa2169df560576ed4b0e428d1e4e6352f432->enter($__internal_e537106021cfc93ba8adf09a2c3ffa2169df560576ed4b0e428d1e4e6352f432_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e537106021cfc93ba8adf09a2c3ffa2169df560576ed4b0e428d1e4e6352f432->leave($__internal_e537106021cfc93ba8adf09a2c3ffa2169df560576ed4b0e428d1e4e6352f432_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_9416846b8d11b203d1ab7a806e5a15df77ef5cfd2658183cc0b43ef71f70f37f = $this->env->getExtension("native_profiler");
        $__internal_9416846b8d11b203d1ab7a806e5a15df77ef5cfd2658183cc0b43ef71f70f37f->enter($__internal_9416846b8d11b203d1ab7a806e5a15df77ef5cfd2658183cc0b43ef71f70f37f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_9416846b8d11b203d1ab7a806e5a15df77ef5cfd2658183cc0b43ef71f70f37f->leave($__internal_9416846b8d11b203d1ab7a806e5a15df77ef5cfd2658183cc0b43ef71f70f37f_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_17e2d904264299654e46a80386395f6ff95e1c87469669b9f89219f92ebe6bfd = $this->env->getExtension("native_profiler");
        $__internal_17e2d904264299654e46a80386395f6ff95e1c87469669b9f89219f92ebe6bfd->enter($__internal_17e2d904264299654e46a80386395f6ff95e1c87469669b9f89219f92ebe6bfd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_17e2d904264299654e46a80386395f6ff95e1c87469669b9f89219f92ebe6bfd->leave($__internal_17e2d904264299654e46a80386395f6ff95e1c87469669b9f89219f92ebe6bfd_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_931a15dfd8b5f29e9f9070d975ce35eee0f87a5be467695d9bd9519ae2fa6c65 = $this->env->getExtension("native_profiler");
        $__internal_931a15dfd8b5f29e9f9070d975ce35eee0f87a5be467695d9bd9519ae2fa6c65->enter($__internal_931a15dfd8b5f29e9f9070d975ce35eee0f87a5be467695d9bd9519ae2fa6c65_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_931a15dfd8b5f29e9f9070d975ce35eee0f87a5be467695d9bd9519ae2fa6c65->leave($__internal_931a15dfd8b5f29e9f9070d975ce35eee0f87a5be467695d9bd9519ae2fa6c65_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block toolbar %}{% endblock %}*/
/* */
/* {% block menu %}*/
/* <span class="label">*/
/*     <span class="icon">{{ include('@WebProfiler/Icon/router.svg') }}</span>*/
/*     <strong>Routing</strong>*/
/* </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     {{ render(path('_profiler_router', { token: token })) }}*/
/* {% endblock %}*/
/* */
