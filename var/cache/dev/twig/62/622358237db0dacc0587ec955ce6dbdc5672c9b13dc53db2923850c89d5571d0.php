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
        $__internal_011d73e033b0d29682401cea0f20fa0cb0ae665b0d786020dcd553531fb94d44 = $this->env->getExtension("native_profiler");
        $__internal_011d73e033b0d29682401cea0f20fa0cb0ae665b0d786020dcd553531fb94d44->enter($__internal_011d73e033b0d29682401cea0f20fa0cb0ae665b0d786020dcd553531fb94d44_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_011d73e033b0d29682401cea0f20fa0cb0ae665b0d786020dcd553531fb94d44->leave($__internal_011d73e033b0d29682401cea0f20fa0cb0ae665b0d786020dcd553531fb94d44_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_4462e8e466269a3fdbfa429382c2fdaa4b01e24fb04faa7a0b39c8e04461d217 = $this->env->getExtension("native_profiler");
        $__internal_4462e8e466269a3fdbfa429382c2fdaa4b01e24fb04faa7a0b39c8e04461d217->enter($__internal_4462e8e466269a3fdbfa429382c2fdaa4b01e24fb04faa7a0b39c8e04461d217_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_4462e8e466269a3fdbfa429382c2fdaa4b01e24fb04faa7a0b39c8e04461d217->leave($__internal_4462e8e466269a3fdbfa429382c2fdaa4b01e24fb04faa7a0b39c8e04461d217_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_2339f13b8fa1fcb8633bac994b2cd01ee3cb8e91fe13b4beca0c30e05aa17ae3 = $this->env->getExtension("native_profiler");
        $__internal_2339f13b8fa1fcb8633bac994b2cd01ee3cb8e91fe13b4beca0c30e05aa17ae3->enter($__internal_2339f13b8fa1fcb8633bac994b2cd01ee3cb8e91fe13b4beca0c30e05aa17ae3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_2339f13b8fa1fcb8633bac994b2cd01ee3cb8e91fe13b4beca0c30e05aa17ae3->leave($__internal_2339f13b8fa1fcb8633bac994b2cd01ee3cb8e91fe13b4beca0c30e05aa17ae3_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_dadf8c2c1f246c659588369d398c885ec7d1071cec852b884828029220d92734 = $this->env->getExtension("native_profiler");
        $__internal_dadf8c2c1f246c659588369d398c885ec7d1071cec852b884828029220d92734->enter($__internal_dadf8c2c1f246c659588369d398c885ec7d1071cec852b884828029220d92734_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_dadf8c2c1f246c659588369d398c885ec7d1071cec852b884828029220d92734->leave($__internal_dadf8c2c1f246c659588369d398c885ec7d1071cec852b884828029220d92734_prof);

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
