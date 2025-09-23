@props(['type' => 'WebPage', 'data' => []])

@php
    $structuredData = [
        '@context' => 'https://schema.org',
        '@type' => $type,
    ];
    
    // Merge provided data with structured data
    $structuredData = array_merge($structuredData, $data);
@endphp

<script type="application/ld+json">
{!! json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
