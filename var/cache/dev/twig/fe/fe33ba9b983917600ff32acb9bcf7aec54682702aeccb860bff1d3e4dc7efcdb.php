<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_fe2bbc96d2ab79aa005ef918b923e5c7cf48df7b6cfb4fd2f5615da225a692c6 extends Twig_Template
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
        $__internal_29205b6b2e35c4147a4297dfcf3719f6a468ba846265fe412ac8d945df9c2dad = $this->env->getExtension("native_profiler");
        $__internal_29205b6b2e35c4147a4297dfcf3719f6a468ba846265fe412ac8d945df9c2dad->enter($__internal_29205b6b2e35c4147a4297dfcf3719f6a468ba846265fe412ac8d945df9c2dad_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_29205b6b2e35c4147a4297dfcf3719f6a468ba846265fe412ac8d945df9c2dad->leave($__internal_29205b6b2e35c4147a4297dfcf3719f6a468ba846265fe412ac8d945df9c2dad_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_430ffdf6686be288464f1de29a7da10807c233dcec42ca470977e64d368ff4de = $this->env->getExtension("native_profiler");
        $__internal_430ffdf6686be288464f1de29a7da10807c233dcec42ca470977e64d368ff4de->enter($__internal_430ffdf6686be288464f1de29a7da10807c233dcec42ca470977e64d368ff4de_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_430ffdf6686be288464f1de29a7da10807c233dcec42ca470977e64d368ff4de->leave($__internal_430ffdf6686be288464f1de29a7da10807c233dcec42ca470977e64d368ff4de_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_7ed46c8d1e1e4bc3aaccb838b65dd154a58235f364e30217c4f153a26570375d = $this->env->getExtension("native_profiler");
        $__internal_7ed46c8d1e1e4bc3aaccb838b65dd154a58235f364e30217c4f153a26570375d->enter($__internal_7ed46c8d1e1e4bc3aaccb838b65dd154a58235f364e30217c4f153a26570375d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_7ed46c8d1e1e4bc3aaccb838b65dd154a58235f364e30217c4f153a26570375d->leave($__internal_7ed46c8d1e1e4bc3aaccb838b65dd154a58235f364e30217c4f153a26570375d_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_9d0545ed99eb64d077dabffe2ec6d75e92a73def36c975f80d904ac8b6fbd187 = $this->env->getExtension("native_profiler");
        $__internal_9d0545ed99eb64d077dabffe2ec6d75e92a73def36c975f80d904ac8b6fbd187->enter($__internal_9d0545ed99eb64d077dabffe2ec6d75e92a73def36c975f80d904ac8b6fbd187_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_9d0545ed99eb64d077dabffe2ec6d75e92a73def36c975f80d904ac8b6fbd187->leave($__internal_9d0545ed99eb64d077dabffe2ec6d75e92a73def36c975f80d904ac8b6fbd187_prof);

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
