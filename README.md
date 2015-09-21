# GSC Styleguide
#### For CSS/HTML
A little bitty guide whose humble purpose is to expedite front-end development by providing a frequently updated repository of code snippets.

## <a name="table-of-contents"></a>Table of Contents
1. [Best Practices](#best-practices)
2. [Framework](#framework)
3. [Typography](#typography)
4. 
6. [Modular Sections](#modular-sections)
7. [Hyperlinks](#hyperlinks)
8. [Buttons](#buttons)
9. [Alert Boxes](#alert-boxes)
10. [Parallax](#parallax)
11. [Animations](#animations)
12. [Responsive CSS](#responsive)

## <a name="best-practices"></a>Best Practices
- **<a href="#1.1">1.1 Indentation<a><a name="user-content-1.1"></a>** Call it a personal preference, but the primary author of this styleguide really adores tabs. The commonly-used double space, when combined with nested SASS selectors, can really make it hard to follow what is nested within what. The greater white space of a tab (4 spaces) is preferred.

  **Bad**
  ```sass
  .sunshine {
    .is-good {
      .for-you {
        color: yellow;
      }
    }
  }
  ```
  
  **Good**
  ```sass
  .sunshine {
      .is-good {
          .for-you {
            color: yellow;
          }
      }
  }
  ```
  
  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#1.2">1.2 Order of Selectors<a><a name="user-content-1.2"></a>** When writing good SASS, ordering selectors is of paramount importance. It makes things easier to find, which saves oodles of time. The preferred order of selectors is as follows:

  - Standard HTML selectors
  - Responsive styles
  - Pseudo elements
  - References to parent selector
  - Class names
  - ID names

  This order should be repeated for every nested level of selectors.

  **A Complete Example**
  ```sass
  // Standard Parent Elements (in Alphabetical Order)
  
  article {
      margin: 20px 0;
  }
  
  p {
      margin: 1em 0;
      
      &:last-of-type {
          margin-bottom: 0;
      }
  }
  
  section {
      background: white;
      margin: 40px 0;
      
      
      // Responsive (Largest Breakpoint to Smallest)
      
      @media screen and (max-width: 768px) {
          margin: 30px 0;
      }
      
      @media screen and (max-width: 568px) {
          margin: 20px 0;
      }
      
      
      // Pseudo Elements (in Alphabetical Order)
      
      &:first-of-type {
          background: #eee;
      }
      
      &:hover {
          background: #ddd;
      }
      
      
      // References to Parent (in Alphabetical Order)
      
      &.primary {
          background: #333;
          color: white;
      }
      
      
      // Standard Child Elements (in Alphabetical Order)
      
      a {
          color: orange;
          
          &:hover {
              color: blue;  // yuck
          }
      }
      
      p {
          font-weight: 500;
          
          @media screen and (max-width: 568px) {
              font-size: 12p;x
          }
      }
      
      
      // Classes (in Alphabetical Order)
      
      .author-meta {
          color: gray;
      }
      
      
      // IDs (in Alphabetical Order)
      
      #social-list {
          position: absolute;
      }
  }
  ```

  **Standard HTML Elements**  
  Should always come first, either in alphabetical order (80% of use cases), or in the order they naturally appear in the markup (as with tables, where `thead` comes first in the markup but after `tbody` in the alphabet).
  
  **Responsive Styles**  
  Should immediately follow any styles on the parent element, and be listed from largest breakpoint to smallest (see <a href="#">Responsive</a> for a more detailed discussion).

  **Pseudo Elements**  
  Like `:hover` and `:first-of-type` should come next, and in alphabetical order. Pseudo elements are always preceded by an ampersand (`&`).
  
  **References to the Parent Selector**  
  Should follow pseudo elements. A parent reference is used whenever you need a more specific reference to the parent, and is also always preceded by an ampersand.
  
  **Classes**  
  Should follow parent references and should also be in alphabetical order.
  
  **Finally, IDs**  
  Should be listed in alphabetical order.

  <a href="#table-of-contents">⬆ Back to Top</a>
 
- **<a href="#1.3">1.3 Order of Declarations<a><a name="user-content-1.3"></a>** Declarations are the individual styles under a selector (e.g., `margin: 0`). These should be in alphabetical order; the sole exception is that mixins should precede selectors, and also be in alphabetical order.

  **Example**
  ```sass
  a {
      @include awesomeMixin();
      @include snazzyMixin();
      color: black;
      padding: 5px;
      text-decoration: none;
  }
  ```
  
  <a href="#table-of-contents">⬆ Back to Top</a>
  
- **<a href="#1.4">1.4 Comments<a><a name="user-content-1.4"></a>** Due to the straightforward nature of SASS and HTML, comments should be pretty limited. When adding comments, follow these 5 rules:

  - Always add a brief comment at the top of your SASS file describing the purpose of the file
  - Use comments to organize your SASS; e.g., as headings to blocks of style rules
  - Use common sense and add comments when the purpose of a selector may not be clear
  - Comments should be preceded with `//` and two line breaks
  - A line break should follow every comment
  
  **Examples**
  ```sass
  /**
   *  GoSpotCheck Styleguide
   *  Base Selectors - this file has styles for default HTML selectors
   */
  
  
  // Headings
  
  h1,
  h2,
  h3 {
      font-weight: bold;
  }
  
  
  // Removes default quote marks
  
  q {
      &:after,
      &:before {
          content: "";
      }
  }
  ```

  <a href="#table-of-contents">⬆ Back to Top</a>

## <a name="framework"></a>The Framework
- **<a href="#2.1">2.1 Introduction</a><a name="user-content-2.1"></a>** To ease development, we created our own humble CSS framework. A CSS framework is, at its core, a small set of rules that lets you create columns of content that fit nicely inside a wider parent, which ultimately lets you easily create an endless number of layouts.

  The framework is admittedly heavy on `<div>` tags, but no more so than other frameworks (I'm looking at _you_, Bootstrap). Ultimately, the extra `<div>` wrappers end up making it easier to create layouts; even though there is more markup than there would be in a custom layout, there is far less custom CSS.

- **<a href="#2.2">2.2 Anatomy</a><a name="user-content-2.2"></a>** When building layouts with the framework, you will use three types of wrappers:
  
  - The outer wrapper
  - An inner "row" wrapper
  - Column wrappers

  There is also an optional fourth "section" wrapper, which lets you create full-width bands of content.
  
  **Example**
  ```html
  <div class="section">
      <div class="wrap">
          <div class="row">
              <div class="width-50">
                  <p>This column takes up half the width of the row.</p>
              </div>
              <div class="width-50">
                  <p>This column also takes up half the width of the row.</p>
              </div>
          </div>
      </div>
  </div> <!-- // section -->
  ```

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#2.2.1">2.2.1 Sections</a><a name="user-content-2.2.1"></a>** The outermost wrapper, while not required for the framework to do its thing, is widely used on the current GSC marketing site. It will take a class of `section` and, by itself, just adds some top and bottom padding:

  ```html
  <div class="section"> ... </div>
  ```
  
  There are several classes you can give `section` to alter its appearance:
  - <a href="#user-content-2.2.1.1">angled-up/down</a>
  - <a href="#user-content-2.2.1.2">dark</a>
  - <a href="#user-content-2.2.1.3">gradient</a>
  - <a href="#user-content-2.2.1.4">hero</a>
  - <a href="#user-content-2.2.1.5">off-white</a>
  - <a href="#user-content-2.2.1.6">orange</a>
  - <a href="#user-content-2.2.1.7">primary-cta</a>
  - <a href="#user-content-2.2.1.8">topo</a>

- **<a href="#2.2.1.1">2.2.1.1 Angled Sections</a><a name="user-content-2.2.1.1"></a>** While somewhat buggy (text can appear blurry in some browsers), this type of section yields some cool visual effects. If you're tired of straight lines, try some angles.

  **Examples**
  ```html
  <div class="section angled-down">
      <div class="wrap">
          <div class="row">
              <div class="width-100">
                  <p>The top edge of this section has an angle sloping down from left to right.</p>
              </div>
          </div>
      </div>
  </div> <!-- // angled-down -->
  
  <div class="section angled-up">
      <div class="wrap">
          <div class="row">
              <div class="width-100">
                  <p>The top edge of this section has an angle sloping up from left to right.</p>
              </div>
          </div>
      </div>
  </div> <!-- // angled-up -->
  ```
  
  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>

  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#2.2.1.2">2.2.1.2 Dark Section</a><a name="user-content-2.2.1.2"></a>** Creates a section with a dark background and light text. Can also be combined with `class="gradient"` to create a dark gradient.

  **Examples**
  ```html
  <div class="section dark">
      <div class="wrap">
          <div class="row">
              <div class="width-100">
                  <p>This section has a dark background and light text.</p>
              </div>
          </div>
      </div>
  </div> <!-- // dark -->
  ```
  
  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>

  <a href="#table-of-contents">⬆ Back to Top</a>
  
- **<a href="#2.2.1.3">2.2.1.3 Gradient Section</a><a name="user-content-2.2.1.3"></a>** Creates a section with a subtle, gray gradient background. Can also be combined with `class="dark"` to create a dark gradient.

  **Examples**
  ```html
  <div class="section gradient">
      <div class="wrap">
          <div class="row">
              <div class="width-100">
                  <p>This section has a subtle gradient background.</p>
              </div>
          </div>
      </div>
  </div> <!-- // gradient -->
  ```
  
  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>

  <a href="#table-of-contents">⬆ Back to Top</a>
  
- **<a href="#2.2.1.4">2.2.1.4 Hero Sections</a><a name="user-content-2.2.1.4"></a>** Creates a hero section, which should be used to introduce a page. The default hero takes up the full height of the viewport, though you can specify varying heights (as a % of the viewport):

  - three-quarter
  - two-third
  - half
  - third
  - quarter
  - fifth

  **Examples**
  ```html
  <div class="section hero">
      <div class="wrap">
          <div class="row">
              <div class="width-100">
                  <h1>Welcome to My Page</h1>
                  <p>This section takes up the full screen.</p>
              </div>
          </div>
      </div>
  </div> <!-- // hero -->
  
  <div class="section hero third">
      <div class="wrap">
          <div class="row">
              <div class="width-100">
                  <h1>Slightly Less Prominent Hero</h1>
                  <p>This section takes up a third of the screen.</p>
              </div>
          </div>
      </div>
  </div> <!-- // hero third -->
  ```
  
  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>

  <a href="#table-of-contents">⬆ Back to Top</a>
  
- **<a href="#2.2.1.5">2.2.1.5 Off-White Section</a><a name="user-content-2.2.1.5"></a>** Creates a section with an off-white background.

  **Examples**
  ```html
  <div class="section off-white">
      <div class="wrap">
          <div class="row">
              <div class="width-100">
                  <p>This section has a slightly gray-ish background.</p>
              </div>
          </div>
      </div>
  </div> <!-- // off-white -->
  ```
  
  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>

  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#2.2.1.6">2.2.1.6 Orance Section</a><a name="user-content-2.2.1.6"></a>** Creates a section with an orange background and light text. This name will eventually be changed to `secondary` since orange is the secondary GSC color (after blue).

  **Examples**
  ```html
  <div class="section orange">
      <div class="wrap">
          <div class="row">
              <div class="width-100">
                  <p>This section has an orange background and light text.</p>
              </div>
          </div>
      </div>
  </div> <!-- // dark -->
  ```
  
  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>

  <a href="#table-of-contents">⬆ Back to Top</a>
  
- **<a href="#2.2.1.7">2.2.1.7 Primary CTA Section</a><a name="user-content-2.2.1.7"></a>** Creates a section with a blue background and light text. The idea is that this color really pops and is ideal for showcasing CTAs. This name will eventually be changed to `primary` since blue is the primary GSC color.

  **Examples**
  ```html
  <div class="section primary-cta">
      <div class="wrap">
          <div class="row">
              <div class="width-25">
                  <img src="cta.jpg">
              </div>
              <div class="width-75">
                  <h3>You Should Buy Our Stuff</h3>
                  <p>Riches and glory will certainly be yours if ye do.</p>
                  <a class="button" href="cta-landing-page.html">Buy Now</a>
              </div>
          </div>
      </div>
  </div> <!-- // primary-cta -->
  ```
  
  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>

  <a href="#table-of-contents">⬆ Back to Top</a>
  
- **<a href="#2.2.1.8">2.2.1.8 Topo Section</a><a name="user-content-2.2.1.8"></a>** Creates a section with a subtle topography background pattern. Useful for adding visual interest where simple color variations won't do.

  **Examples**
  ```html
  <div class="section topo">
      <div class="wrap">
          <div class="row">
              <div class="width-100">
                  <p>This section has a neat topo pattern background.</p>
              </div>
          </div>
      </div>
  </div> <!-- // topo -->
  ```
  
  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>

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

## <a name="typography"></a>Typography
- **<a href="#2.1">2.1 Headings</a><a name="user-content-2.1"></a>** GoSpotCheck utilizes `<h1>` to `<h5>` tags. The `<h6>` tag isn’t used because it’s the HTML equivalent of a dewclaw. Generally speaking, each heading should be used as such:

  - `<h1>` Introduces the entire page. There should only be one `<h1>` per page.
  - `<h2>` Introduces a major section of content.
  - `<h3>` Introduces a minor section of content.
  - `<h4>` Usually used stylistically (i.e., because it looks best) and to introduce sidebar sections or minor bits of content.
  - `<h5>` Since a block of text almost never requires this level of detail, the `<h5>` tag is rarely used.

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
  - Unless body text appears on a dark background, it should be `#666`.
  - On dark backgrounds, body text should be pure white (`#fff`).  
  - Body text is always set in **Helvetica**. If the user's OS supports it, the ideal font weight is `300` (equivalent to Helvetica Thin).
  
  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>


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
- **<a href="#12.1">12.1 Naming Conventions for Breakpoints</a><a name="user-content-12.1"></a>** The styleguide currently comes stocked with 8 breakpoints, which are named after U.S. Army ranks. Most of the breakpoints coincide with iOS device widths:
  
  - `private` (320px)
  - `corporal` (375px)
  - `sergeant` (480px)
  - `captain` (568px)
  - `major` (667px)
  - `lieutenant` (768px)
  - `colonel` (1024px)
  - `general` (~1200px)
  
  **Why Army Ranks?** 
  The idea of using abstract names like U.S. Army ranks is driven by the notion that **breakpoints should not be device specific.** It is more important to tailor your breakpoints to your design and not to individual devices, because there are simply too many devices out there today; you can't possibly cater to them all.
  
  The styleguide uses iOS breakpoints as a starting point because they are convenient and tend to cover most use cases, but you should not feel compelled to stick to them.
    
  Using U.S. Army ranks _maintains a relationship_ between the breakpoints (i.e., you can tell which breakpoint is larger or smaller than any other breakpoint by knowing your Army ranks).
  
  **Note:** If you need to add additional breakpoints, consider adding <a href="http://www.militaryfactory.com/ranks/army_ranks.asp">additional ranks</a>.

  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#12.2">12.2 Range of Breakpoints</a><a name="user-content-12.2"></a>** The upper limit of your breakpoints should be determined by your design. The default upper limit in the styleguide is `general`, which corresponds to 1200px, and the lower limit is `private`, which corresponds to 320px.

  **Note:** While the upper limit can vary, there is not _currently_ any reason to worry about sizes below 320px, though this may change in the near future (durned smartwatches...).

  <a href="#table-of-contents">⬆ Back to Top</a>
  
- **<a href="#12.3">12.3 Special Mixin (rename me)</a><a name="user-content-12.3"></a>** A special mixin called `respond-to` allows you to use the rank naming convention to write your media queries like:

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
  
  It is the equivalent of setting `max-width`:
  ```sass
  // this...
  h4 {
    @include respond-to('sergeant') {
      font-size: 20px;
    }
  }
  
  // ...converts to this
  @media screen and (max-width: 480px) {
    h4 {
      font-size: 20px;
    }
  }
  ```
  
- **<a href="#12.4">12.4 Placement of Media Queries</a><a name="user-content-12.4"></a>** For placement of responsive style rules (i.e., _Media Queries_), there are three options, which we've given colorful names:

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

- **<a href="#12.5">12.5 Ordering Your Media Queries</a><a name="user-content-12.5"></a>** To ensure that style rules are properly inherited, **breakpoints should always be ordered from largest to smallest.** Otherwise, smaller screens will inherit rules intended for larger screens, and you'll feel compelled to take an early lunch.

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
