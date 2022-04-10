 <?= $helper->getHeadPrintCode('New '.$entity_class_name) ?>

{% block body %}
    <h1>{% trans %}Create new <{% endtrans %}?= $entity_class_name ?></h1>

    {{ include('<?= $templates_path ?>/_form.html.twig') }}

    <a href="{{ path('<?= $route_name ?>_index') }}">{% trans %}back to list {% endtrans %}</a>
{% endblock %}
