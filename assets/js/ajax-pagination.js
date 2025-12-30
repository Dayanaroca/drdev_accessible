document.addEventListener('click', function(e) {
    const btn = e.target.closest('[data-ajax-page]');
    if (!btn) return;

    e.preventDefault();

    const container = document.querySelector(btn.dataset.target);
    if (!container) return;

    const data = new FormData();
    data.append('action', 'drdev_ajax_pagination');
    data.append('paged', btn.dataset.ajaxPage);
    data.append('post_type', btn.dataset.postType);
    data.append('posts_per_page', btn.dataset.postsPerPage);
    data.append('template', btn.dataset.template);
    data.append('nonce', drdevAjax.nonce);
    data.append('target', btn.dataset.target);
    if (btn.dataset.taxQuery) {
        data.append('tax_query', btn.dataset.taxQuery);
    }

    fetch(drdevAjax.url, { method: 'POST', body: data })
    .then(res => res.json())
    .then(res => {
        if (!res.success) {
            console.error(res.data);
            return;
        }

        // Actualiza posts
        container.innerHTML = res.data.html;

        // Reemplaza la paginación solo dentro del mismo bloque
        const parentSection = container.closest('section');
        const oldPagination = parentSection.querySelector('.pagination-wrapper');
        if (oldPagination) {
            oldPagination.outerHTML = res.data.pagination_html;
        }
    })
    .catch(err => console.error(err));
});



