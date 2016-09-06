{
    "@context": "http://schema.org",
    "@type": "ContactPage",
    "name": "Contact eWebWizards",
    "description": "Contact page for eWebWizards, a leading service provider and expert in responsive website designing,logo designing,ecommerce application,mobile application development,digital marketing.",
    "url": "<?php echo __APPLICATION_URL."/inquire"?>",
    "image": "<?php echo __APPLICATION_URL."/static/img/logo.gif"?>",
    "breadcrumb": {
        "@type": "BreadcrumbList",
        "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "item": {
                "@id": "<?php echo __APPLICATION_URL?>",
                "name": "Home"
            }
        }, {
            "@type": "ListItem",
            "position": 2,
            "item": {
                "@id": "<?php echo __APPLICATION_URL."/inquire"?>",
                "name": "Contact"
            }
        }]
    }
}