# GSC Styleguide
A little bitty guide to help us keep our code consistent and our heads clear. Unless there's beer involved. That can't be helped.

## <a name="table-of-contents"></a>Table of Contents
1. [Colors](#colors)
2. [Typography](#typography)
3. TBD
4. [Grid](#grid)
5. [Flexbox](#flexbox)
6. [Modular Sections](#modular-sections)
7. [Hyperlinks](#hyperlinks)
8. [Buttons](#buttons)
9. [Alert Boxes](#alert-boxes)
10. [Parallax](#parallax)
11. [Animations](#animations)
12. [Responsive CSS](#responsive)

## <a name="colors"></a>Colors
- **<a href="#1.1">1.1 Primary Colors</a><a name="user-content-1.1"></a>** GoSpotCheck (GSC) has two primary colors: black and orange. Yep, Halloween is our favorite holiday.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  **Orange**
  - _Primary: `#ff9800`_
  - Light Orange: `#ffb600`
  - Dark Orange: `#ff7900`
  
  **Black**
  - _Primary: `#000000`_
  - Dark Gray: `#404040`
  - Medium Gray: `#808080`
  - Light Gray: `#bfbfbf`
  - Lighter Gray: `#f7f7f7`

  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#1.2">1.2 Secondary Colors</a><a name="user-content-1.2"></a>** Occasionally, shades of blue may be used, primarily for links and buttons.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  **Blue**
  - _Primary: `#00bdff`_
  - Light Blue: `#39daff`
  - Dark Blue: `#0097d4`

  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#1.3">1.3 Tertiary Colors</a><a name="user-content-1.3"></a>** Finally, there are two tertiary colors (pink and green) that should be used only sparingly.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  **Green**
  - _Primary: `#00d833`_
  - Light Green: `#00ff42`
  - Dark Green: `#00ad2d`

  **Pink**
  - _Primary: `#ff008c`_
  - Light Pink: `#ff66ba`
  - Dark Pink: `#ce0241`

  <a href="#table-of-contents">⬆ Back to Top</a>

## <a name="typography"></a>Typography
- **<a href="#2.1">2.1 Headings</a><a name="user-content-2.1"></a>** GoSpotCheck utilizes `<h1>` to `<h5>` tags. The `<h6>` tag isn’t used because it’s the HTML equivalent of a dewclaw. Generally speaking, each heading should be used in the following ways:

  - **H1** Introduces the entire page. There should only be one `<h1>` per page.
  - **H2** Introduces a major section of content.
  - **H3** Introduces a minor section of content.
  - **H4** Usually used stylistically (i.e., because it looks best) and to introduce sidebar sections or minor bits of content.
  - **H5** Since a block of text almost never requires this level of detail, the `<h5>` tag is rarely used.

  **Default Styling**  
  - Unless a heading appears on a dark background, it should always be GSC Black (`#000`).
  - On dark backgrounds, headings should be pure white (`#fff`).  
  - Headings are always set in **Gotham**.
  
  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
    
  **Margins**  
  Since the default margins are usually overkill, we remove them and add them back in using the sibling selector, such that headings always gain a top margin:
  
  ```sass
  * + h2,
  * + h3,
  * + h4,
  * + h5 {
    margin-top: 1.5em;
  }
  ```

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#2.2">2.2 Body Text</a><a name="user-content-2.2"></a>** Body text includes any non-heading text (e.g., paragraphs and lists).

  **Default Styling**
  - Unless body text appears on a dark background, it should always be GSC Dark Gray (`#404040`).
  - On dark backgrounds, body text should be pure white (`#fff`).  
  - Body text is always set in **Helvetica**. If the user's OS supports it, the ideal font weight is `300` (equivalent to Helvetica Thin).
  
  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>

## <a name="grid"></a>Grid Classes
- **<a href="#4.1">4.1 The "Grid"</a><a name="user-content-4.1"></a>** The word "grid" is a bit misleading, because it implies that we're working inside a fixed box. In reality, the styles here use the width of the parent as a starting point, and allow you to set the widths of child containers as a percentage of the width of the parent.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  You can specify a relative width for any container by adding the class `width-X`, where _X_ is a percentage. For now, there are thirteen widths that you can use:
  
  ```html
  <section>
    <div class="width-20">This element is 20% the width of the parent.</div>
    <div class="width-25">This element is 25% the width of the parent.</div>
    <div class="width-33">This element is 33% the width of the parent.</div>
    <div class="width-40">This element is 40% the width of the parent.</div>
    <div class="width-50">This element is 50% the width of the parent.</div>
    <div class="width-60">This element is 60% the width of the parent.</div>
    <div class="width-66">This element is 66% the width of the parent.</div>
    <div class="width-75">This element is 75% the width of the parent.</div>
    <div class="width-80">This element is 80% the width of the parent.</div>
    <div class="width-100">This element is 100% the width of the parent.</div>
    <div class="width-125">This element is 125% the width of the parent.</div>
    <div class="width-full">This element is the full width of the default container (960px).</div>
    <div class="width-full-125">This element is 125% the width of the default container.</div>
  </section>
  ```
  
  Two things to note:
  - Applying class `width-` to any element will center it with `margin: 0 auto`
  - Use of `width-100` is useful for giving full width to elements with `position: fixed`

  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#4.2">4.2 Nesting Widths</a><a name="user-content-4.2"></a>** It can be very useful to "nest" widths inside of one another. Since width is always relative to the parent (and ultimately, to the viewport), it's easy to anticipate how wide something will be.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  ```html
  <body>
    <!-- this section is 75% width of the viewport -->
    <section class="width-75">
      <div class="width-75">This child element is 75% width of the section</div>
      <div class="width-25">This child element is 25% width of the section</div>
    </section>
  </body>
  ```

  <a href="#table-of-contents">⬆ Back to Top</a>

## <a name="flexbox"></a>Flexbox
- **<a href="#5.1">5.1 Base Class</a><a name="user-content-5.1"></a>** Whenever possible, you should use flexible containers (flexboxes) instead of traditional floats, since the code required to create a layout with flexboxes is simpler, cleaner, and easier to understand. You can make any element a flexbox by adding the `flex` class to it.  By itself, the `flex` class doesn't do much beyond add some padding; the real magic happens when you add child elements and special helper classes (see <a href="#5.2">5.2</a>, <a href="#5.3">5.3</a>, and <a href="#5.4">5.4</a>).

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>

  ```html
  <section class="flex"> ... </section>
  ```

  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#5.2">5.2 Flex Wrap</a><a name="user-content-5.2"></a>** The `flex` class is designed to be used in conjunction with several helper classes. The first of these is `-wrap-n`, which can be appended to `flex`. This applies styling to the child elements of your flexbox, so they are spaced correctly.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
    
  In `-wrap-n`, _n_ represents the number of children in the flexbox. For example, if there are 3 child elements, you would write:
  
  ```html
  <section class="flex-wrap-3">
    <div>First child</div>
    <div>Second child</div>
    <div>Third child</div>
  </section>
  ```
  
  Two things to note:
  - There is currently support for up to 5 children (since you generally won't need more than 5 columns in your layout)
  - You may get funky results if the number of children differs from _n_ in `-wrap-n`
  
  ```html
  <!-- unlikely you will need to use this, but it's available -->
  <section class="flex-wrap-1">
    <div>Only child</div>
  </section>
  
  <!-- flexbox with 2 children -->
  <section class="flex-wrap-2">
    <div>First child</div>
    <div>Second child</div>
  </section>
  
  <!-- flexbox with 3 children -->
  <section class="flex-wrap-3">
    <div>First child</div>
    <div>Second child</div>
    <div>Third child</div>
  </section>
  
  <!-- flexbox with 4 children -->
  <section class="flex-wrap-4">
    <div>First child</div>
    <div>Second child</div>
    <div>Third child</div>
    <div>Fourth child</div>
  </section>
  
  <!-- flexbox with 5 children -->
  <section class="flex-wrap-5">
    <div>First child</div>
    <div>Second child</div>
    <div>Third child</div>
    <div>Fourth child</div>
    <div>
      <p>Descendents of child elements are not affected by flexbox, so you can have as many descendents as you want; only direct descendents matter.</p>
    </div>
  </section>
  ```

  <a href="#table-of-contents">⬆ Back to Top</a>
  
- **<a href="#5.3">5.3 Align Items</a><a name="user-content-5.3"></a>** You can also concatenate another class, `-align-x`, onto the above two; in this case, to control the vertical alignment of the child elements of your flexbox. You can align child elements to the top, middle, or bottom.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  ```html
  <section class="flex-wrap-3-align-top">
    <div>Child elements</div>
    <div>of this section</div>
    <div>will be aligned to the top</div>
  </section>
  
  <section class="flex-wrap-2-align-middle">
    <div>Child elements of this section</div>
    <div>will be vertically centered</div>
  </section>
  
  <section class="flex-wrap-3-align-bottom">
    <div>Child elements</div>
    <div>of this section</div>
    <div>will be aligned to the bottom</div>
  </section>
  ```
  
  Note that in the example above, the `align-` class was used in conjunction with the `-wrap-` class. This is not only allowed, but encouraged.
  
  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#5.4">5.4 Using Flexbox with "Grid" Classes</a><a name="user-content-5.4"></a>** If you are using the `flex-wrap-` class, you will usually not need to specify the widths of your children with the special "grid" classes (for example, `width-50`, `width-33`). If all the child elements of a flexible container are the same width, you will not need to explicitly set a class on these child elements, because flexbox will take care of this for you.

  ```html
  <!-- in this example, the "width-33" classes are superfluous, since "flex-wrap-3"
       will set the width of all children to 33% -->
  <section class="flex-wrap-3">
    <div class="width-33">First equal-width child.</div>
    <div class="width-33">Second equal-width child.</div>
    <div class="width-33">Third equal-width child.</div>
  </section>
  
  <!-- you can clean up the above code and achieve the same styling by removing
       the "width-33" classes -->
  <section class="flex-wrap-3">
    <div>First equal-width child.</div>
    <div>Second equal-width child.</div>
    <div>Third equal-width child.</div>
  </section>
  
  <!-- however, if any of your flexbox's children are NOT the same width, you should
       specifically set the widths of ALL children -->
  <section class="flex-wrap-3">
    <div class="width-33">First child.</div>
    <div class="width-50">Second child, of a different width.</div>
    <div class="width-33">Third child.</div>
  </section>
  ```
  
  Note that the grid classes are not really intended to be used with flexbox, since the widths are set by flexbox and tend to override the widths set by the grid. Let's take the last example from above:
  
  ```html
  <section class="flex-wrap-3">
    <div class="width-33">First child.</div>
    <div class="width-50">Second child, of a different width.</div>
    <div class="width-33">Third child.</div>
  </section>
  ```
  
  Here, the middle child will not actually expand to 50% of the width of the flexbox, but it _will_ be wider than the other two children - sometimes. In this case, the width of the center child depends in part on the width of the contents of the other children.
  
  Generally speaking, you should be fine just relying on flexbox and occasionally setting explicit grid classes on the flexbox's children. Experiment as needed to achieve the layout you want.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  <a href="#table-of-contents">⬆ Back to Top</a>

## <a name="modular-sections"></a>Modular Sections
- **<a href="#6.1">6.1 Hero</a><a name="user-content-6.1"></a>** A _hero_ is the topmost, introductory section of a page. A hero should almost always have a background image applied to it. Four sizes (as a percentage of the viewport height) are available; simply add the appropriate class to your `<section>` element (preferred over `<div>`).

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>

  ```html
  <section class="height-full"> ... </section>
  <section class="height-half"> ... </section>
  <section class="height-third"> ... </section>
  <section class="height-quarter"> ... </section>
  ```

  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#6.2">6.2 Angled</a><a name="user-content-6.2"></a>** A section can be angled either "up" (left side slopes up to the right - right side higher) or "down" (left side slopes down to the right - right side lower). An angled `<section>` must have an inner `<div>` so the contents are not also skewed.

  Note that `angled-up` only affects the **top** edge of the section; the bottom edge will remain flat.  
  Note too that `angled-down` only affects the **bottom** edge of the section; the top edge will remain flat.
  
  TO DO: It is possible to layer angled sections so that both top and bottom edges are angled...

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>

  ```html
  <!-- section with up-sloping angle -->
  <section class="angled-up">
    <div>
      ...
    </div>
  </section>
  
  <!-- section with down-sloping angle -->
  <section class="angled-down">
    <div>
      ...
    </div>
  </section>
  ```

  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#6.3">6.3 Testimonial</a><a name="user-content-6.3"></a>** Add a full-width testimonial section to your page by dropping in the sample HTML below. Two things to note:
  - `width-50` can be changed to any other supported width (e.g., `width-75` on one side and `width-25` on the other)
  - the `<div>` containing the `<blockquote>` can appear first or second, depending on which side you want the quote to appear

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>

  ```html
  <section class="testimonial">
    <div class="flex-wrap-2 width-full">
      <div class="width-50">
        <blockquote>
          <p>GoSpotCheck is the best!</p>
          <footer>
            <cite>Matt Talbot</cite>
            CEO, GoSpotCheck
          </footer>
        </blockquote>
      </div>
      <div class="width-50">
        <img alt="Matt Talbot" src="talbot.png">
      </div>
    </div>
  </section>
  ```

  <a href="#table-of-contents">⬆ Back to Top</a>
  
- **<a href="#6.4">6.4 Topo</a><a name="user-content-6.4"></a>** You can add the GSC topography pattern as a background image to any section by adding `class="topo"`, like so:

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  ```html
  <section class="topo">
      ...
  </section>
  ```

  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#6.5">6.5 Dark Background</a><a name="user-content-6.5"></a>** Give any section a black background and white text by adding `class="dark"`.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  ```html
  <section class="dark">
      ...
  </section>
  ```

  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#6.6">6.6 Gradient</a><a name="user-content-6.6"></a>** Give any section a simple, gray gradient as a background by adding `class="gradient"`.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  ```html
  <section class="gradient">
      ...
  </section>
  ```

  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#6.7">6.7 Extra Padding</a><a name="user-content-6.7"></a>** Sometimes, you may find that you need a little extra space between the edges of your section and the inner content; this is especially likely on angled sections. You can add 3 distinct classes to get either padding on top _and_ bottom, just bottom padding, or just top padding.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  ```html
  <section class="extra-padding">
      <p>This section will have twice the normal padding on top and bottom.</p>
  </section>
  
  <section class="extra-padding-bottom">
      <p>This section will have twice the normal padding on the bottom.</p>
  </section>
  
  <section class="extra-padding-top">
      <p>This section will have twice the normal padding on the top.</p>
  </section>
  ```

  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#6.8">6.8 No Padding</a><a name="user-content-6.8"></a>** When you need to remove padding entirely from the top, bottom, or both edges, add one of the classes below. Useful for when your `<section>` has an image that should appear like it's coming out from the top or bottom edge.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  ```html
  <section class="no-padding">
      <p>This section will have no padding.</p>
  </section>
  
  <section class="no-padding-bottom">
      <p>This section will have no bottom padding.</p>
  </section>
  
  <section class="no-padding-top">
      <p>This section will have no top padding.</p>
  </section>
  
  <section class="no-padding-left">
      <p>This section will have no left padding.</p>
  </section>
  
  <section class="no-padding-right">
      <p>This section will have no right padding.</p>
  </section>
  ```

  <a href="#table-of-contents">⬆ Back to Top</a>

## <a name="hyperlinks"></a>Hyperlinks
- **<a href="#7.1">7.1 Linked Text</a><a name="user-content-7.1"></a>** When adding a hyperlink to the page, be sure to highlight the appropriate text in your link. A link should make sense by itself; that is, if you only knew the link text and did not have any of the surrounding sentence, you could guess where the link would take you.

  **Bad** _(standing alone, the linked text is vague)_
  ```html
  <p>For more information, visit Samantha Holloway's <a href="...">LinkedIn page</a>.</p>
  ```
  
  **Good** _(standing alone, the linked text tells us where the links goes)_
  ```html
  <p>For more information, visit <a href="...">Samantha Holloway's LinkedIn page</a>.</p>
  ```
  <a href="#table-of-contents">⬆ Back to Top</a>
  
- **<a href="#7.2">7.2 Styling</a><a name="user-content-7.2"></a>** Links should always be **bold** and colored <a href="#1.2">GSC Blue</a> (`#00bdff`). On hover, links should darken to GSC Dark Blue (`#0097d4`) and be underlined.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>

  <a href="#table-of-contents">⬆ Back to Top</a>
  
- **<a href="#7.3">7.3 Opening in a New Tab</a><a name="user-content-7.3"></a>** With few exceptions, **a link should never open in a new tab**. This behavior takes control away from the user, which is almost never a good idea. There are two allowed exceptions:
  
  - When linking directly to a file (almost never applicable, since the browser handles file downloads).
  - When following the link would interrupt an ongoing process (e.g., linking to the privacy policy inside of a lightbox where a user is completing a form).
  
  To open a link a new tab, simply add `target="_blank"` to your anchor tag; the CSS will take care of the rest and add a visual indicator that the link will open elsewhere:
  
  ```html
  <p>For sarcastic remarks, <a href="..." target="_blank">send Chris Kampfe an email</a>.</p>
  ```
  
  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>

  <a href="#table-of-contents">⬆ Back to Top</a>

## <a name="buttons"></a>Buttons
- **<a href="#8.1">8.1 General Use</a><a name="user-content-8.1"></a>** Buttons should be used sparingly, to draw attention to an action that should be taken. Avoid having buttons adjacent to each other (especially when they look the same), as this confuses the user. Avoid using the HTML `<button>` element in favor of `<a>`.

  <a href="#table-of-contents">⬆ Back to Top</a>
  
- **<a href="#8.2">8.2 Default Button</a><a name="user-content-8.2"></a>** The default button is blue with white text, and is ideal for most applications.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  ```html
  <a class="button">Click Me</a>
  ```

  <a href="#table-of-contents">⬆ Back to Top</a>
  
- **<a href="#8.3">8.3 Light Button</a><a name="user-content-8.3"></a>** For those times you have a dark background and just can't seem to find a button that works... Voilà! The "light" button practically pops off the page with white on black.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  ```html
  <a class="button light">Click Me</a>
  ```
  
  <a href="#table-of-contents">⬆ Back to Top</a>
  
- **<a href="#8.4">8.4 Clear Button</a><a name="user-content-8.4"></a>** A sort of inverse to the default button, the "clear" button has no background with a blue border and blue text, and fills in on hover.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>

  ```html
  <a class="button clear">Click Me</a>
  ```
  
  <a href="#table-of-contents">⬆ Back to Top</a>

## <a name="alert-boxes"></a>Alert Boxes
- **<a href="#9.1">9.1 Alert Boxes...</a><a name="user-content-9.1"></a>** Alert boxes are notification bars generally only used for contact forms and on the app dashboard...

  <a href="#table-of-contents">⬆ Back to Top</a>

## <a name="parallax"></a>Parallax
- **<a href="#10.1">10.1 Introduction</a><a name="user-content-10.1"></a>** The latest casualty in the CSS vs. JS battle is parallax. While not as flexible as pure JavaScript parallax, CSS parallax is much cleaner. Credit for this innovation goes to <a href="http://keithclark.co.uk/articles/pure-css-parallax-websites/">Keith Clark</a>. 
  
  While powerful, this technique isn't appropriate for most uses and, unless the entire page is designed to have a parallax effect, requires a bit of trial and error to get just right. It's best to limit the use of this trick because, let's be honest: parallax _as a technique_ is dated. With that disclaimer aside, let's see how it's done...

  <a href="http://keithclark.co.uk/articles/pure-css-parallax-websites/demo3/"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#10.2">10.2 Parallax Elements</a><a name="user-content-10.2"></a>** The first step to getting parallax on your page is to create a parallax wrapper:

  ```html
  <div class="parallax">
    ...
  </div>
  ```
  
  Then, within this wrapper, create one or more parallax **groups**. A group contains one or more layers that will slide over each other (<a href="http://keithclark.co.uk/articles/pure-css-parallax-websites/demo3/">see the parallax demo</a>, which makes this more apparent):
  
  ```html
  <div class="parallax">
    <div class="parallax-group">
      ...
    </div>
    
    <div class="parallax-group">
      ...
    </div>
  </div>
  ```
  
  Finally, within each group, wrap the things you want to parallax inside parallax **layers**:
  ```html
  <div class="parallax">
    <div class="parallax-group">
      <div class="parallax-layer-back">
        <h1>Header, which will scroll more quickly than the "deep" layer</h1>
      </div>
      
      <div class="parallax-layer-deep">
        Perhaps a background image on this layer, which will scroll more slowly than the header.
        This difference in scroll speeds creates the parallax effect.
      </div>
    </div>
  </div>
  ```

  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#10.3">10.3 Parallax Layers</a><a name="user-content-10.3"></a>** Parallax layers are where the magic happens. Each layer, based on its class, slides at a different rate relative to the natural scroll speed. There are four layer types:

  ```html
  <div class="parallax-layer-fore">
    <p>This layer slides more quickly than the scroll speed.</p>
  </div>
  
  <div class="parallax-layer-base">
    <p>This layer slides at the same rate as the scroll speed.</p>
  </div>
  
  <div class="parallax-layer-back">
    <p>This layer slides more slowly than the scroll speed.</p>
  </div>
  
  <div class="parallax-layer-deep">
    <p>This layer slides much more slowly than the scroll speed.</p>
  </div>
  ```

  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#10.4">10.4 Grouping Layers</a><a name="user-content-10.4"></a>** The layers that slide more quickly should come first in the DOM. This hasn't been thoroughly tested, but this is how Keith Clark has it on his demos. For example, since `fore` slides more quickly than `back`, you would place it before `back` in your HTML:

  ```html
  <div class="parallax">
    <div class="parallax-group">
      <div class="parallax-layer-fore">...</div>
      <div class="parallax-layer-back">...</div>
    </div>
  </div>
  ```
  
  Not every bit of content on your page has to be inside a `parallax-group` - only the bits that you want to parallax. So you could have:
  
  ```html
  <div class="parallax">
    <div class="parallax-group">
      <div class="parallax-layer-back">...</div>
      <div class="parallax-layer-deep">...</div>
    </div>
    
    <div>
      <p>Some other area of content</p>
    </div>
    
    <div class="parallax-group">
      <div class="parallax-layer-base">...</div>
    </div>
  </div>
  ```
  
  Above all, you'll want to experiment to see what works - layering the parallax layers properly is key to the whole effect working.
 
  <a href="#table-of-contents">⬆ Back to Top</a>

## <a name="animations"></a>CSS Animations
- **<a href="#11.1">11.1 General Use</a><a name="user-content-11.1"></a>** A whole boatload of CSS animations are built into this framework, ready to use, by simply adding a couple of classes. The great majority of the animations are lifted from Daniel Eden's <a href="https://daneden.github.io/animate.css/">Animate.css</a>. Some of the less-likely-to-be-used animations are stripped out, and other custom animations added in, but the bulk of the _Animate.css_ animations are available.

  <a href="https://daneden.github.io/animate.css/"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  To animate anything, simply add the class `animated` to it, along with one of the following classes, which corresponds to a particular animation:

  - `bounce`
  - `flash`
  - `jello`
  - `pulse`
  - `rubberBand`
  - `shake`
  - `swing`
  - `tada`
  - `wobble`
  - `bounceIn`
  - `bounceInDown`
  - `bounceInLeft`
  - `bounceInRight`
  - `bounceInUp`
  - `bounceOut`
  - `bounceOutDown`
  - `bounceOutLeft`
  - `bounceOutRight`
  - `bounceOutUp`
  - `fadeIn`
  - `fadeInDown`
  - `fadeInLeft`
  - `fadeInRight`
  - `fadeInUp`
  - `fadeOut`
  - `fadeOutDown`
  - `fadeOutLeft`
  - `fadeOutRight`
  - `fadeOutUp`
  - `flipInX`
  - `flipInY`
  - `flipOutX`
  - `flipOutY`
  - `rotateIn`
  - `rotateInDownLeft`
  - `rotateInDownRight`
  - `rotateInUpLeft`
  - `rotateInUpRight`
  - `rotateOut`
  - `rotateOutDownLeft`
  - `rotateOutDownRight`
  - `rotateOutUpLeft`
  - `rotateOutUpRight`
  - `slideInDown`
  - `slideInLeft`
  - `slideInRight`
  - `slideInUp`
  - `slideOutDown`
  - `slideOutLeft`
  - `slideOutRight`
  - `slideOutUp`
  - `zoomIn`
  - `zoomInDown`
  - `zoomInLeft`
  - `zoomInRight`
  - `zoomInUp`
  - `zoomOut`
  - `zoomOutDown`
  - `zoomOutLeft`
  - `zoomOutRight`
  - `zoomOutUp`
  - `rollIn`
  - `rollOut`
  - `throb`
  
  **Note:** By default, the animation will run once. You can set it to run endlessly by adding the `infinite` class.
  
  **Example**
  ```html
  <h1 class="animated infinite bounce">Infinite Bouncing Header</h1>
  ```

  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#11.2">11.2 Animating on Scroll</a><a name="user-content-11.2"></a>** If you don't want your CSS animation to run right away, you can add a special class, `animate-on-scroll`, to any element, which will cause the animation to be delayed until the element is scrolled into view.

  <a href="https://daneden.github.io/animate.css/"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  **Specifying Animations**  
  The element to be animated should _not_ have the `animated` class on it; this is added by JavaScript when the element is scrolled into view. You _will_, however, need to add a `data-animation` attribute, specifying which animation to run. The animation should be set to one of the animation names <a href="#11.1">listed above</a>
  
  **Delaying Animations**  
  If you want to delay the animation, you can add a `data-animation-delay` attribute. This attribute should be specified in milliseconds (1000ms = 1 second).
  
  **Examples**
  ```html
  <h1 class="animate-on-scroll" data-animation="slideInLeft">
    This header will slide in from the left as soon as it comes into view
  </h1>
  
  <div class="animate-on-scroll" data-animation="fadeIn" data-animation-delay="2000">
    <p>This entire div will fade in after a 2 second (2000 ms) delay.</p>
  </div>
  ```
  
  <a href="#table-of-contents">⬆ Back to Top</a>
  
## <a name="responsive"></a>Responsive
- **<a href="#12.1">12.1 Placement of Media Queries</a><a name="user-content-12.1"></a>** For placement of responsive style rules (i.e., _Media Queries_), there are three options, which we've given colorful names:

  - **Monolithic:** All media queries for the entire project are placed in a single SASS file
  - **Chunked:** Media queries for individual SASS files are placed at the end of each file
  - **Inline:** Media queries are added within the selectors they affect
   
  **Monolithic**  
  Placing all of your project's responsive styles in the same file makes sense if you're writing plain CSS; however, with SASS, this method is the opposite of modular and makes updating code a chore.

  **Chunked**  
  The second method, which chunks style rules within breakpoints at the end of individual SASS files, looks like this:
  
  ```sass
  // default styles
  footer {
    position: relative;
    
    h4 {
      font-size: 24px;
    }
  }
  
  // responsive styles (at end of file)
  @media screen and (max-width: 768px) {
    footer {
      position: static;
    
      h4 {
        font-size: 20px;
      }
    }
  }
  
  @media screen and (max-width: 480px) {
    footer h4 {
      font-size: 18px;
    }
  }
  ```
  
  The chunking method has the advantage of making it easier to modify styles at a particular breakpoint, but the disadvantage of creating additional instances of individual selectors, making it harder to track down, say, all `footer` styles.
  
  **Inline**  
  _This is the preferred method_, and has the advantage of keeping all style rules for a particular selector in the same code block, so you can, for instance, see all styles for `footer` in the same place. An example:

  ```sass
  footer {
    position: relative;
  
    @media screen and (max-width: 768px) {
      position: static;
    }
  	
    h4 {
      font-size: 24px;

      @media screen and (max-width: 768px) {
        font-size: 20px;
      }

      @media screen and (max-width: 480px) {
        font-size: 18px;
      }
    }
  }
  ```
  
  _A note on performance:_ The "dispersed" method can end up creating more selectors when the final CSS file is compiled; however, <a href="http://benfrain.com/inline-or-combined-media-queries-in-sass-fight/">tests have shown</a> that the effect on final file size is negligible.
  
  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#12.2">12.2 Naming Conventions for Breakpoints</a><a name="user-content-12.2"></a>** The styleguide currently comes stocked with 8 breakpoints, which are named after U.S. Army ranks. Most of the breakpoints coincide with iOS device widths:
  
  - `private` (320px)
  - `corporal` (375px)
  - `sergeant` (480px)
  - `captain` (568px)
  - `major` (667px)
  - `lieutenant` (768px)
  - `colonel` (1024px)
  - `general` (~1200px)
   
  A special mixin called `respond-to` allows you to use this special naming convention to write your media queries like this:

  ```sass
  footer {
    position: relative;
  
    @include respond-to('lieutenant') {
      position: static;
    }
  	
    h4 {
      font-size: 24px;

      @include respond-to('lieutenant') {
        font-size: 20px;
      }

      @include respond-to('sergeant') {
        font-size: 18px;
      }
    }
  }
  ```
  
  The idea of using abstract names like U.S. Army ranks is driven by the notion that **breakpoints should not be device specific.** It is more important to tailor your breakpoints to your design and not to individual devices, because there are simply too many devices out there today; you can't possibly cater to them all.
  
  The styleguide uses iOS breakpoints as a starting point because they are convenient and tend to cover most use cases, but you should not feel compelled to stick to them.
    
  Using U.S. Army ranks _maintains a relationship_ between the breakpoints (i.e., you can tell which breakpoint is larger or smaller than any other breakpoint by knowing your Army ranks). You could easily use any other scaled naming convention.

  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#12.3">12.3 Ordering Your Media Queries</a><a name="user-content-12.3"></a>** To ensure that style rules are properly inherited, **breakpoints should always be ordered from largest to smallest.** Otherwise, smaller screens will inherit rules intended for larger screens, and you'll feel compelled to take an early lunch.

  **Bad** _(major is outranked by colonel, and should come after)_
  ```sass
  h1 {
    font-size: 36px;
    
    @include respond-to('major') {
      font-size: 28px;
    }
    
    @include respond-to('colonel') {
      font-size: 32px;
    }
  }
  ```

  **Good** _(colonel is the higher rank, and properly comes first)_
  ```sass
  h1 {
    font-size: 36px;
    
    @include respond-to('colonel') {
      font-size: 32px;
    }
    
    @include respond-to('major') {
      font-size: 28px;
    }
  }
  ```
  <a href="#table-of-contents">⬆ Back to Top</a>
