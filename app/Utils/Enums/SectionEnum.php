<?php

namespace App\Utils\Enums;

enum SectionEnum: string
{
    case HERO_LEFT_IMAGE_SECTION = 'hero_left_image_section';
    case HERO_RIGHT_IMAGE_SECTION = 'hero_right_image_section';
    case CARD_SECTION = 'card_section';
    case STATS_SECTION = 'stats_section';
    case PROJECT_SECTION = 'project_section';
    case FAQ_SECTION = 'faq_section';
    case PAGE_SECTION = 'posts_section';
    case BLOG_SECTION = 'blog_section';
    case FULL_IMAGE_WIDTH = 'full_image_width';

    case TESTIMONIAL_SECTION = 'testimonials_section';

    case BOOK_SITE_VISIT = 'book_sit_visit_section';

    case VIDE0_SECTION = 'video_section';
    case PAST_PROJECT_SECTION = 'past_project_section';
    case SLIDER_SECTION = 'slider_section';
    case GALLERY_SECTION = 'gallery_section';
    case HEADER_SECTION = 'header_section';
    case TIMELINE_SECTION = 'timeline_section';

    case HERO_SERVICE_SECTION = 'hero_with_service_section';
    case ACCORDION_SECTION = 'accordion_section';
    case HTML_SECTION = 'html_section';
    case TEAM_SECTION = 'team_section';
    case PAGE_BUILDER = 'hero_page_builder_section';

    public function sectionPath(): string
    {
        return match ($this) {
            static::HERO_LEFT_IMAGE_SECTION => 'templates.hero.left',
            static::CARD_SECTION => 'templates.card.index',
            static::STATS_SECTION => 'templates.stats.index',
            static::FAQ_SECTION => 'templates.faqs.faq',
            static::PROJECT_SECTION => 'templates.projects.index',
            static::BLOG_SECTION => 'templates.blog.index',
            static::FULL_IMAGE_WIDTH => 'templates.full_image_width.index',
            static::GALLERY_SECTION => 'templates.gallery.index',
            static::TESTIMONIAL_SECTION => 'templates.testimonials.index',
            static::BOOK_SITE_VISIT => 'templates.cta.book_site_visit',
            static::HEADER_SECTION => 'templates.cta.heading',
            static::VIDE0_SECTION => 'templates.embeded.video',
            static::PAST_PROJECT_SECTION => 'templates.projects.past',
            static::SLIDER_SECTION => 'templates.slider.index',
            static::TIMELINE_SECTION => 'templates.timeline.index',
            static::HERO_SERVICE_SECTION => 'templates.hero.service_hero',
            static::ACCORDION_SECTION => 'templates.faqs.accordion',
            static::TEAM_SECTION => 'templates.teams.index',
            static::HTML_SECTION => 'templates.hero.html',
            static::PAGE_BUILDER => 'templates.hero.page_builder',
            default => 'templates.hero.left',
        };
    }
}
