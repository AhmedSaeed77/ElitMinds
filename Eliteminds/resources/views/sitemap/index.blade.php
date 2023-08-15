<?php echo'<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
     <url>
        <loc>https://eliteminds.co/</loc>
        <lastmod>2022-11-27T00:29:36+00:00</lastmod>
        <priority>0.95</priority>
    </url>
    <url>
    <loc>https://eliteminds.co/register</loc>
    <lastmod>2022-11-27T00:29:36+00:00</lastmod>
    <priority>0.95</priority>
    </url>
      <url>
    <loc>https://eliteminds.co/about-us</loc>
    <lastmod>2022-11-27T00:29:36+00:00</lastmod>
    <priority>0.9595</priority>
    </url>
    <url>
    <loc>https://eliteminds.co/contact</loc>
    <lastmod>2022-11-27T00:29:36+00:00</lastmod>
    <priority>0.64</priority>
    </url>
    <url>
    <loc>https://eliteminds.co/Refund</loc>
    <lastmod>2022-11-27T00:29:36+00:00</lastmod>
    <priority>0.95</priority>
    </url>
    <url>
    <loc>https://eliteminds.co/PublicFAQ</loc>
    <lastmod>2022-11-27T00:29:36+00:00</lastmod>
    <priority>0.95</priority>
    </url>
    <url>
    <loc>https://eliteminds.co/password/reset</loc>
    <lastmod>2022-11-27T00:29:36+00:00</lastmod>
    <priority>0.64</priority>
    </url>
    <url>
    <loc>https://eliteminds.co/terms</loc>
    <lastmod>2022-11-27T00:29:36+00:00</lastmod>
    <priority>0.95</priority>
    </url>
    <url>
    <loc>https://eliteminds.co/Policy</loc>
    <lastmod>2022-11-27T00:29:36+00:00</lastmod>
    <priority>0.95</priority>
    </url> 
    
     @foreach(\App\Course::all() as $c)
     <url>
        <loc>{{route('package.by.course').'?course='.$c->slug}} </loc>
        <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z',strtotime($c->updated_at)) }}</lastmod>
        <priority>0.95</priority>
     </url>
       
    @endforeach
 
    @foreach (\App\Packages::where('active' , 1)->get(); as $p)
      <url>
        <loc>https://eliteminds.co/package/{{$p->slug}} </loc>
        <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z',strtotime($p->updated_at)) }}</lastmod>
        <priority>0.95</priority>
     </url>
    @endforeach
    @foreach(\App\Section::all() as $section)
    <url>
        <loc>{{route('public.blog.index').'?section_id='.$section->id}}</loc>
        <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z',strtotime($section->updated_at)) }}</lastmod>
        <priority>0.95</priority>
    </url>
    @endforeach
    @foreach (\App\Post::all() as $s)
      <url>
        <loc>https://eliteminds.co/blog/{{$s->slug}} </loc>
        <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z',strtotime($s->updated_at)) }}</lastmod>
        <priority>0.95</priority>
     </url>
    @endforeach
  

</urlset>