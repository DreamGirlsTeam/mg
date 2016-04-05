<?php

/* default/index.html.twig */
class __TwigTemplate_4a98d45216bda7eb2d4b73f89f45e51d241890ee63fd1b7d2abcd8a0fd802251 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "default/index.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'stylesheets' => array($this, 'block_stylesheets'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_827068c6ec9bc6e418e88dc697299ebcd2f6b5186fd1e1b6c8613782c5f7e4de = $this->env->getExtension("native_profiler");
        $__internal_827068c6ec9bc6e418e88dc697299ebcd2f6b5186fd1e1b6c8613782c5f7e4de->enter($__internal_827068c6ec9bc6e418e88dc697299ebcd2f6b5186fd1e1b6c8613782c5f7e4de_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "default/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_827068c6ec9bc6e418e88dc697299ebcd2f6b5186fd1e1b6c8613782c5f7e4de->leave($__internal_827068c6ec9bc6e418e88dc697299ebcd2f6b5186fd1e1b6c8613782c5f7e4de_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_632082f23e067d6899e0ef3ee25ed46ac7688efdd76cf1cdf04caf496942ff78 = $this->env->getExtension("native_profiler");
        $__internal_632082f23e067d6899e0ef3ee25ed46ac7688efdd76cf1cdf04caf496942ff78->enter($__internal_632082f23e067d6899e0ef3ee25ed46ac7688efdd76cf1cdf04caf496942ff78_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <div id=\"background\">
        <div id=\"Background\">

            <img src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("/src/GuideBundle/Resources/images/Background.png"), "html", null, true);
        echo "\" alt=\"background\" >
        </div>
        <div id=\"Layer1\"><img src=\"images/Layer1.png\"></div>
        <div id=\"ABOUTPROJECT\"><img src=\"images/ABOUTPROJECT.png\"></div>
        <div id=\"YourmadheartgoesCrus\"><img src=\"images/YourmadheartgoesCrus.png\"></div>
        <div id=\"Whenyouareseventeeny\"><img src=\"images/Whenyouareseventeeny.png\"></div>
        <div id=\"Layer3\"><img src=\"images/Layer3.png\"></div>
        <div id=\"e2\"><img src=\"images/e2.png\"></div>
        <div id=\"e1\"><img src=\"images/e1.png\"></div>
        <div id=\"m1\"><img src=\"images/m1.png\"></div>
        <div id=\"m2\"><img src=\"images/m2.png\"></div>
        <div id=\"Shape4\"><img src=\"images/Shape4.png\"></div>
        <div id=\"Shape5\"><img src=\"images/Shape5.png\"></div>
        <div id=\"Shape6\"><img src=\"images/Shape6.png\"></div>
        <div id=\"Shape7\"><img src=\"images/Shape7.png\"></div>
        <div id=\"l2\"><img src=\"images/l2.png\"></div>
        <div id=\"l1\"><img src=\"images/l1.png\"></div>
        <div id=\"twi\"><img src=\"images/twi.png\"></div>
        <div id=\"fb\"><img src=\"images/fb.png\"></div>
        <div id=\"vk\"><img src=\"images/vk.png\"></div>
        <div id=\"Eleonorakorobova\"><img src=\"images/Eleonorakorobova.png\"></div>
        <div id=\"THETEAM\"><img src=\"images/THETEAM.png\"></div>
        <div id=\"Layer0copy\"><img src=\"images/Layer0copy.png\"></div>
        <div id=\"Shape3\"><img src=\"images/Shape3.png\"></div>
        <div id=\"Shape3copy\"><img src=\"images/Shape3copy.png\"></div>
        <div id=\"login\"><img src=\"images/login.png\"></div>
        <div id=\"Contactus\"><img src=\"images/Contactus.png\"></div>
        <div id=\"MG\"><img src=\"images/MG.png\"></div>
        <div id=\"Benedignosciturbenec\"><img src=\"images/Benedignosciturbenec.png\"></div>
        <div id=\"Shape2\"><img src=\"images/Shape2.png\"></div>
        <div id=\"MEDICALGUIDE\"><img src=\"images/MEDICALGUIDE.png\"></div>
    </div>
";
        
        $__internal_632082f23e067d6899e0ef3ee25ed46ac7688efdd76cf1cdf04caf496942ff78->leave($__internal_632082f23e067d6899e0ef3ee25ed46ac7688efdd76cf1cdf04caf496942ff78_prof);

    }

    // line 40
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_639da22bf1f830416930a1522264efada903565e197d0b419b0104d422497650 = $this->env->getExtension("native_profiler");
        $__internal_639da22bf1f830416930a1522264efada903565e197d0b419b0104d422497650->enter($__internal_639da22bf1f830416930a1522264efada903565e197d0b419b0104d422497650_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 41
        echo "
";
        
        $__internal_639da22bf1f830416930a1522264efada903565e197d0b419b0104d422497650->leave($__internal_639da22bf1f830416930a1522264efada903565e197d0b419b0104d422497650_prof);

    }

    public function getTemplateName()
    {
        return "default/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 41,  86 => 40,  46 => 7,  41 => 4,  35 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block body %}*/
/*     <div id="background">*/
/*         <div id="Background">*/
/* */
/*             <img src="{{ asset('/src/GuideBundle/Resources/images/Background.png') }}" alt="background" >*/
/*         </div>*/
/*         <div id="Layer1"><img src="images/Layer1.png"></div>*/
/*         <div id="ABOUTPROJECT"><img src="images/ABOUTPROJECT.png"></div>*/
/*         <div id="YourmadheartgoesCrus"><img src="images/YourmadheartgoesCrus.png"></div>*/
/*         <div id="Whenyouareseventeeny"><img src="images/Whenyouareseventeeny.png"></div>*/
/*         <div id="Layer3"><img src="images/Layer3.png"></div>*/
/*         <div id="e2"><img src="images/e2.png"></div>*/
/*         <div id="e1"><img src="images/e1.png"></div>*/
/*         <div id="m1"><img src="images/m1.png"></div>*/
/*         <div id="m2"><img src="images/m2.png"></div>*/
/*         <div id="Shape4"><img src="images/Shape4.png"></div>*/
/*         <div id="Shape5"><img src="images/Shape5.png"></div>*/
/*         <div id="Shape6"><img src="images/Shape6.png"></div>*/
/*         <div id="Shape7"><img src="images/Shape7.png"></div>*/
/*         <div id="l2"><img src="images/l2.png"></div>*/
/*         <div id="l1"><img src="images/l1.png"></div>*/
/*         <div id="twi"><img src="images/twi.png"></div>*/
/*         <div id="fb"><img src="images/fb.png"></div>*/
/*         <div id="vk"><img src="images/vk.png"></div>*/
/*         <div id="Eleonorakorobova"><img src="images/Eleonorakorobova.png"></div>*/
/*         <div id="THETEAM"><img src="images/THETEAM.png"></div>*/
/*         <div id="Layer0copy"><img src="images/Layer0copy.png"></div>*/
/*         <div id="Shape3"><img src="images/Shape3.png"></div>*/
/*         <div id="Shape3copy"><img src="images/Shape3copy.png"></div>*/
/*         <div id="login"><img src="images/login.png"></div>*/
/*         <div id="Contactus"><img src="images/Contactus.png"></div>*/
/*         <div id="MG"><img src="images/MG.png"></div>*/
/*         <div id="Benedignosciturbenec"><img src="images/Benedignosciturbenec.png"></div>*/
/*         <div id="Shape2"><img src="images/Shape2.png"></div>*/
/*         <div id="MEDICALGUIDE"><img src="images/MEDICALGUIDE.png"></div>*/
/*     </div>*/
/* {% endblock %}*/
/* {% block stylesheets %}*/
/* */
/* {% endblock %}*/
/* */
