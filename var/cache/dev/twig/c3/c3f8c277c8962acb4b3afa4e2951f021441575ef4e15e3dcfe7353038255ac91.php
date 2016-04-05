<?php

/* GuideBundle:Default:index.html.twig */
class __TwigTemplate_7e0743cad23b519e40fd05fcc2a9a9539543d80ecfa49d90342a739cfba45f8e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "GuideBundle:Default:index.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'names' => array($this, 'block_names'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_27058bb0eacdb2e11b4416458308d6e34943c1b66cf3f30332eb2e860163029c = $this->env->getExtension("native_profiler");
        $__internal_27058bb0eacdb2e11b4416458308d6e34943c1b66cf3f30332eb2e860163029c->enter($__internal_27058bb0eacdb2e11b4416458308d6e34943c1b66cf3f30332eb2e860163029c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GuideBundle:Default:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_27058bb0eacdb2e11b4416458308d6e34943c1b66cf3f30332eb2e860163029c->leave($__internal_27058bb0eacdb2e11b4416458308d6e34943c1b66cf3f30332eb2e860163029c_prof);

    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        $__internal_63042abc9ac79435b45e9ffc7993cc4c9d63ed8c916a413eec173c66390d7a78 = $this->env->getExtension("native_profiler");
        $__internal_63042abc9ac79435b45e9ffc7993cc4c9d63ed8c916a413eec173c66390d7a78->enter($__internal_63042abc9ac79435b45e9ffc7993cc4c9d63ed8c916a413eec173c66390d7a78_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 3
        echo "<div>
    ";
        // line 4
        $this->displayBlock('names', $context, $blocks);
        // line 6
        echo "</div>
";
        
        $__internal_63042abc9ac79435b45e9ffc7993cc4c9d63ed8c916a413eec173c66390d7a78->leave($__internal_63042abc9ac79435b45e9ffc7993cc4c9d63ed8c916a413eec173c66390d7a78_prof);

    }

    // line 4
    public function block_names($context, array $blocks = array())
    {
        $__internal_c91a2fad4eab92ddcc8548f6c462f4b2a32e82874882d180036ae66b06cdbfa0 = $this->env->getExtension("native_profiler");
        $__internal_c91a2fad4eab92ddcc8548f6c462f4b2a32e82874882d180036ae66b06cdbfa0->enter($__internal_c91a2fad4eab92ddcc8548f6c462f4b2a32e82874882d180036ae66b06cdbfa0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "names"));

        // line 5
        echo "    ";
        
        $__internal_c91a2fad4eab92ddcc8548f6c462f4b2a32e82874882d180036ae66b06cdbfa0->leave($__internal_c91a2fad4eab92ddcc8548f6c462f4b2a32e82874882d180036ae66b06cdbfa0_prof);

    }

    public function getTemplateName()
    {
        return "GuideBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 5,  54 => 4,  46 => 6,  44 => 4,  41 => 3,  35 => 2,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* {% block body %}*/
/* <div>*/
/*     {% block names %}*/
/*     {% endblock %}*/
/* </div>*/
/* {% endblock %}*/
/* */
