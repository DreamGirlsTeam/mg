<?php

/* @WebProfiler/Collector/exception.html.twig */
class __TwigTemplate_de07837ad4985da6a6ad19dd2c628df44c24df083f2aa3ee812e5288cb6aab32 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/exception.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
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
        $__internal_42c713b3a0cf3bc6a9d4e014ed0a18e7fe1cb999441cc032c7bdd40699a243eb = $this->env->getExtension("native_profiler");
        $__internal_42c713b3a0cf3bc6a9d4e014ed0a18e7fe1cb999441cc032c7bdd40699a243eb->enter($__internal_42c713b3a0cf3bc6a9d4e014ed0a18e7fe1cb999441cc032c7bdd40699a243eb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_42c713b3a0cf3bc6a9d4e014ed0a18e7fe1cb999441cc032c7bdd40699a243eb->leave($__internal_42c713b3a0cf3bc6a9d4e014ed0a18e7fe1cb999441cc032c7bdd40699a243eb_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_d33d48dc6d75846ebbad631cfca2504b943d91df77591a8487cd42028b47736c = $this->env->getExtension("native_profiler");
        $__internal_d33d48dc6d75846ebbad631cfca2504b943d91df77591a8487cd42028b47736c->enter($__internal_d33d48dc6d75846ebbad631cfca2504b943d91df77591a8487cd42028b47736c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    ";
        if ($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) {
            // line 5
            echo "        <style>
            ";
            // line 6
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_exception_css", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
            echo "
        </style>
    ";
        }
        // line 9
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
";
        
        $__internal_d33d48dc6d75846ebbad631cfca2504b943d91df77591a8487cd42028b47736c->leave($__internal_d33d48dc6d75846ebbad631cfca2504b943d91df77591a8487cd42028b47736c_prof);

    }

    // line 12
    public function block_menu($context, array $blocks = array())
    {
        $__internal_1a23d5b8b98151570d4878f0b2daeab4a09f1348ccf6bd52ad597c01ab483f9a = $this->env->getExtension("native_profiler");
        $__internal_1a23d5b8b98151570d4878f0b2daeab4a09f1348ccf6bd52ad597c01ab483f9a->enter($__internal_1a23d5b8b98151570d4878f0b2daeab4a09f1348ccf6bd52ad597c01ab483f9a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 13
        echo "    <span class=\"label ";
        echo (($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) ? ("label-status-error") : ("disabled"));
        echo "\">
        <span class=\"icon\">";
        // line 14
        echo twig_include($this->env, $context, "@WebProfiler/Icon/exception.svg");
        echo "</span>
        <strong>Exception</strong>
        ";
        // line 16
        if ($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) {
            // line 17
            echo "            <span class=\"count\">
                <span>1</span>
            </span>
        ";
        }
        // line 21
        echo "    </span>
";
        
        $__internal_1a23d5b8b98151570d4878f0b2daeab4a09f1348ccf6bd52ad597c01ab483f9a->leave($__internal_1a23d5b8b98151570d4878f0b2daeab4a09f1348ccf6bd52ad597c01ab483f9a_prof);

    }

    // line 24
    public function block_panel($context, array $blocks = array())
    {
        $__internal_4e88edec8f3060a5aefce3f9b7ca12f650b4299b7a1eeaad0ee07cf556b221bc = $this->env->getExtension("native_profiler");
        $__internal_4e88edec8f3060a5aefce3f9b7ca12f650b4299b7a1eeaad0ee07cf556b221bc->enter($__internal_4e88edec8f3060a5aefce3f9b7ca12f650b4299b7a1eeaad0ee07cf556b221bc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 25
        echo "    <h2>Exceptions</h2>

    ";
        // line 27
        if ( !$this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) {
            // line 28
            echo "        <div class=\"empty\">
            <p>No exception was thrown and caught during the request.</p>
        </div>
    ";
        } else {
            // line 32
            echo "        <div class=\"sf-reset\">
            ";
            // line 33
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_exception", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
            echo "
        </div>
    ";
        }
        
        $__internal_4e88edec8f3060a5aefce3f9b7ca12f650b4299b7a1eeaad0ee07cf556b221bc->leave($__internal_4e88edec8f3060a5aefce3f9b7ca12f650b4299b7a1eeaad0ee07cf556b221bc_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/exception.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 33,  114 => 32,  108 => 28,  106 => 27,  102 => 25,  96 => 24,  88 => 21,  82 => 17,  80 => 16,  75 => 14,  70 => 13,  64 => 12,  54 => 9,  48 => 6,  45 => 5,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     {% if collector.hasexception %}*/
/*         <style>*/
/*             {{ render(path('_profiler_exception_css', { token: token })) }}*/
/*         </style>*/
/*     {% endif %}*/
/*     {{ parent() }}*/
/* {% endblock %}*/
/* */
/* {% block menu %}*/
/*     <span class="label {{ collector.hasexception ? 'label-status-error' : 'disabled' }}">*/
/*         <span class="icon">{{ include('@WebProfiler/Icon/exception.svg') }}</span>*/
/*         <strong>Exception</strong>*/
/*         {% if collector.hasexception %}*/
/*             <span class="count">*/
/*                 <span>1</span>*/
/*             </span>*/
/*         {% endif %}*/
/*     </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     <h2>Exceptions</h2>*/
/* */
/*     {% if not collector.hasexception %}*/
/*         <div class="empty">*/
/*             <p>No exception was thrown and caught during the request.</p>*/
/*         </div>*/
/*     {% else %}*/
/*         <div class="sf-reset">*/
/*             {{ render(path('_profiler_exception', { token: token })) }}*/
/*         </div>*/
/*     {% endif %}*/
/* {% endblock %}*/
/* */
