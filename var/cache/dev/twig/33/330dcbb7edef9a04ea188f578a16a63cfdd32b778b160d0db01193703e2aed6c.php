<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_c4d02402613d84edfb780af9fc231975581c6028c70d9ebb928d7fbc5516adf7 extends Twig_Template
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
        $__internal_620f5d0c16daf120a9c2a3966e3a352dc7f64e55ca46a0c08865bcd6afb7eb81 = $this->env->getExtension("native_profiler");
        $__internal_620f5d0c16daf120a9c2a3966e3a352dc7f64e55ca46a0c08865bcd6afb7eb81->enter($__internal_620f5d0c16daf120a9c2a3966e3a352dc7f64e55ca46a0c08865bcd6afb7eb81_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_620f5d0c16daf120a9c2a3966e3a352dc7f64e55ca46a0c08865bcd6afb7eb81->leave($__internal_620f5d0c16daf120a9c2a3966e3a352dc7f64e55ca46a0c08865bcd6afb7eb81_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_b0021d05a21e2c153522f4fb232b40556b34abf531e9fdbb414263065bc9c5e5 = $this->env->getExtension("native_profiler");
        $__internal_b0021d05a21e2c153522f4fb232b40556b34abf531e9fdbb414263065bc9c5e5->enter($__internal_b0021d05a21e2c153522f4fb232b40556b34abf531e9fdbb414263065bc9c5e5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_b0021d05a21e2c153522f4fb232b40556b34abf531e9fdbb414263065bc9c5e5->leave($__internal_b0021d05a21e2c153522f4fb232b40556b34abf531e9fdbb414263065bc9c5e5_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_1c1c92c41ac043412300965fd992ca7d30935ead8df5e8f87b483df343027e48 = $this->env->getExtension("native_profiler");
        $__internal_1c1c92c41ac043412300965fd992ca7d30935ead8df5e8f87b483df343027e48->enter($__internal_1c1c92c41ac043412300965fd992ca7d30935ead8df5e8f87b483df343027e48_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_1c1c92c41ac043412300965fd992ca7d30935ead8df5e8f87b483df343027e48->leave($__internal_1c1c92c41ac043412300965fd992ca7d30935ead8df5e8f87b483df343027e48_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_5bd275b9c6e5137465098ee7025f5ebbc5c0d4a5ec24d3bf63d02852ab214457 = $this->env->getExtension("native_profiler");
        $__internal_5bd275b9c6e5137465098ee7025f5ebbc5c0d4a5ec24d3bf63d02852ab214457->enter($__internal_5bd275b9c6e5137465098ee7025f5ebbc5c0d4a5ec24d3bf63d02852ab214457_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_5bd275b9c6e5137465098ee7025f5ebbc5c0d4a5ec24d3bf63d02852ab214457->leave($__internal_5bd275b9c6e5137465098ee7025f5ebbc5c0d4a5ec24d3bf63d02852ab214457_prof);

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
