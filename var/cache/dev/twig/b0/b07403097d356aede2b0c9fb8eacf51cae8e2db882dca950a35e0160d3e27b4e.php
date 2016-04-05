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
        $__internal_f64f4fe350f4662f484fb43399c745253cc3e64a05143b55ac7b7434c8954f85 = $this->env->getExtension("native_profiler");
        $__internal_f64f4fe350f4662f484fb43399c745253cc3e64a05143b55ac7b7434c8954f85->enter($__internal_f64f4fe350f4662f484fb43399c745253cc3e64a05143b55ac7b7434c8954f85_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_f64f4fe350f4662f484fb43399c745253cc3e64a05143b55ac7b7434c8954f85->leave($__internal_f64f4fe350f4662f484fb43399c745253cc3e64a05143b55ac7b7434c8954f85_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_7dff0cc2d2b7910efa7ff69fff0c041f784927633273e8ba17f139815328a00b = $this->env->getExtension("native_profiler");
        $__internal_7dff0cc2d2b7910efa7ff69fff0c041f784927633273e8ba17f139815328a00b->enter($__internal_7dff0cc2d2b7910efa7ff69fff0c041f784927633273e8ba17f139815328a00b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

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
        
        $__internal_7dff0cc2d2b7910efa7ff69fff0c041f784927633273e8ba17f139815328a00b->leave($__internal_7dff0cc2d2b7910efa7ff69fff0c041f784927633273e8ba17f139815328a00b_prof);

    }

    // line 12
    public function block_menu($context, array $blocks = array())
    {
        $__internal_88e515dd9eff85faee75f4dddae7b35f1bfdd93a91a13b78622fccae11b567a9 = $this->env->getExtension("native_profiler");
        $__internal_88e515dd9eff85faee75f4dddae7b35f1bfdd93a91a13b78622fccae11b567a9->enter($__internal_88e515dd9eff85faee75f4dddae7b35f1bfdd93a91a13b78622fccae11b567a9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

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
        
        $__internal_88e515dd9eff85faee75f4dddae7b35f1bfdd93a91a13b78622fccae11b567a9->leave($__internal_88e515dd9eff85faee75f4dddae7b35f1bfdd93a91a13b78622fccae11b567a9_prof);

    }

    // line 24
    public function block_panel($context, array $blocks = array())
    {
        $__internal_f03e709aeebf0d495a970a1378081e5d0932d689f2b6575ebd5320eea7461f84 = $this->env->getExtension("native_profiler");
        $__internal_f03e709aeebf0d495a970a1378081e5d0932d689f2b6575ebd5320eea7461f84->enter($__internal_f03e709aeebf0d495a970a1378081e5d0932d689f2b6575ebd5320eea7461f84_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

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
        
        $__internal_f03e709aeebf0d495a970a1378081e5d0932d689f2b6575ebd5320eea7461f84->leave($__internal_f03e709aeebf0d495a970a1378081e5d0932d689f2b6575ebd5320eea7461f84_prof);

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
