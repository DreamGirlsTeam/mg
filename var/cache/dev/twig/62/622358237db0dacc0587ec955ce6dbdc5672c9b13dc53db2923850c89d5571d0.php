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
        $__internal_e72cfc1eec083a27790f3a1249eed2db606b15ef1ba212c205afc11e5bc9c085 = $this->env->getExtension("native_profiler");
        $__internal_e72cfc1eec083a27790f3a1249eed2db606b15ef1ba212c205afc11e5bc9c085->enter($__internal_e72cfc1eec083a27790f3a1249eed2db606b15ef1ba212c205afc11e5bc9c085_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e72cfc1eec083a27790f3a1249eed2db606b15ef1ba212c205afc11e5bc9c085->leave($__internal_e72cfc1eec083a27790f3a1249eed2db606b15ef1ba212c205afc11e5bc9c085_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_3dc501d8bba924e58e88d441748ce8a168ce683dd1fac8a397e121d6b707cef9 = $this->env->getExtension("native_profiler");
        $__internal_3dc501d8bba924e58e88d441748ce8a168ce683dd1fac8a397e121d6b707cef9->enter($__internal_3dc501d8bba924e58e88d441748ce8a168ce683dd1fac8a397e121d6b707cef9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_3dc501d8bba924e58e88d441748ce8a168ce683dd1fac8a397e121d6b707cef9->leave($__internal_3dc501d8bba924e58e88d441748ce8a168ce683dd1fac8a397e121d6b707cef9_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_f115ef6934f662016303dfab382349c4e63cbe52698cc5b3aac9507581be457e = $this->env->getExtension("native_profiler");
        $__internal_f115ef6934f662016303dfab382349c4e63cbe52698cc5b3aac9507581be457e->enter($__internal_f115ef6934f662016303dfab382349c4e63cbe52698cc5b3aac9507581be457e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_f115ef6934f662016303dfab382349c4e63cbe52698cc5b3aac9507581be457e->leave($__internal_f115ef6934f662016303dfab382349c4e63cbe52698cc5b3aac9507581be457e_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_bf195887eeba57b7808e2a6a897e3cda5e715a04f83f30a481adb9c9a2b0445f = $this->env->getExtension("native_profiler");
        $__internal_bf195887eeba57b7808e2a6a897e3cda5e715a04f83f30a481adb9c9a2b0445f->enter($__internal_bf195887eeba57b7808e2a6a897e3cda5e715a04f83f30a481adb9c9a2b0445f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_bf195887eeba57b7808e2a6a897e3cda5e715a04f83f30a481adb9c9a2b0445f->leave($__internal_bf195887eeba57b7808e2a6a897e3cda5e715a04f83f30a481adb9c9a2b0445f_prof);

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
