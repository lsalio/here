{% include 'includes/aside.volt' %}

<div class="h-common-wrapper">
  {% include 'includes/header.volt' %}

  <main class="h-explore-body">
    {% if article !== null %}
      <article class="h-article-container h-container h-content-box">
        <div class="h-article-header">
          <h2 class="h-article-title">{{ article.article_title }}</h2>
          <div class="h-article-metadata">
            <p class="h-article-create-time">{{ article.create_time | date }}</p>
            <p class="h-article-category">
              {% for relation in article.categoryRelation %}
                <span><a href="{{ url('category/' ~ relation.category.category_abbr) }}">
                  {{ relation.category.category_name }}
                </a></span>
              {% endfor %}
            </p>
            <p class="h-article-data">
              <span class="h-article-data-view">{{ article.article_views }}</span>
              <span class="h-article-data-like">{{ article.article_like }}</span>
            </p>
          </div>
        </div>
        <div class="h-article-content line-numbers">
          {{ article.article_body | markdown }}
        </div>
        <div class="h-article-metadata">

        </div>
      </article>
    {% else %}
      {% include 'includes/error/404.volt' %}
    {% endif %}
  </main>

  {% include 'includes/footer.volt' %}
</div>

{% include 'includes/widgets/back-to-top.volt' %}

<script>
    new Sidebar(_$('.h-common-wrapper')).init();
    new BackToTop(300, 500).init();
</script>