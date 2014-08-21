# Exemple de layout
Voici un exemple de layout que j'utilise pour balancer directement le contenue de la vue `disclaimer.html.twig` dans le design de mon site.
(en surchargeant le bundle)

```
{% extends main_layout %}

{% block title %}MONSITE.COM | Mentions légales{% endblock %}

{% block description %}
    La description de mon site web
{% endblock %}

{% block body %}
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                {% block disclaimer_content %}
                {% endblock disclaimer_content %}
            </div>
        </div>
    </div>

{% endblock body %}
```
