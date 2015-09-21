# GSC Styleguide
#### For CSS/HTML
A little bitty guide whose humble purpose is to expedite front-end development by providing a frequently updated repository of code snippets.

## <a name="table-of-contents"></a>Table of Contents
1. [Best Practices](#best-practices)
2. [Framework](#framework)
3. [Responsive](#responsive)
4. [Boxes](#boxes)
5. [Galleries](#galleries)
6. [Forms](#forms)
7. [Buttons](#buttons)
8. [Alert Boxes](#alert-boxes)
9. [Kickers](#kickers)
10. [Lists](#lists)
11. [Tables](#tables)
12. [Pagers](#pagers)
13. [Typography](#typography)
14. [Hyperlinks](#hyperlinks)
15. [Animations](#animations)
16. [Utility Classes](#utility)

## <a name="best-practices"></a>Best Practices
- **<a href="#1.1">1.1 Indentation<a><a name="user-content-1.1"></a>** Call it a personal preference, but the primary author of this styleguide really adores tabs. The commonly-used double space, when combined with nested SASS selectors, can really make it hard to follow what is nested within what. The greater white space of a tab (4 spaces) is preferred.

  **Less Than Ideal**
  ```sass
  .sunshine {
    .is-good {
      .for-you {
        color: yellow;
      }
    }
  }
  ```
  
  **Preferred**
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

- **<a href="#1.2">1.2 Line Breaks<a><a name="user-content-1.2"></a>** To improve legibility, always add a line break after a comma-separated list of selectors.

  **Muy Mal**
  ```sass
  h1, h2, h3 {
      color: red;
  }
  ```
  
  **Excellente**
  ```sass
  h1,
  h2,
  h3 {
      color: red;
  }
  ```
  
  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#1.3">1.3 Order of Selectors<a><a name="user-content-1.3"></a>** When writing good SASS, ordering selectors is of paramount importance. It makes things easier to find, which saves oodles of time. The preferred order of selectors is as follows:

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
  Should immediately follow any styles on the parent element, and be listed from largest breakpoint to smallest (see <a href="#responsive">Responsive</a> for a more detailed discussion).

  **Pseudo Elements**  
  Like `:hover` and `:first-of-type` should come next, and in alphabetical order. Pseudo elements are always preceded by an ampersand (`&`).
  
  **References to the Parent Selector**  
  Should follow pseudo elements. A parent reference is used whenever you need a more specific reference to the parent, and is also always preceded by an ampersand.
  
  **Classes**  
  Should follow parent references and should also be in alphabetical order.
  
  **Finally, IDs**  
  Should be listed in alphabetical order.

  <a href="#table-of-contents">⬆ Back to Top</a>
 
- **<a href="#1.4">1.4 Order of Declarations<a><a name="user-content-1.4"></a>** Declarations are the individual styles under a selector (e.g., `margin: 0`). These should be in alphabetical order; the sole exception is that mixins should precede selectors, and also be in alphabetical order.

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
  
- **<a href="#1.5">1.5 Comments<a><a name="user-content-1.5"></a>** Due to the straightforward nature of SASS and HTML, comments should be pretty limited. When adding comments, follow these 5 rules:

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
  
  **Note:** The framework utilizes CSS flexbox vs. floats, so is not compatible with IE < 10.

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
  
- **<a href="#2.2.2">2.2.2 Wrapper</a><a name="user-content-2.2.2"></a>** Whether or not you use the `section` classes just described, you will need to wrap your row and columns inside an outer wrapper:

  ```html
  <div class="wrap"> ... </div>
  ```
  
  This will center your content and give it a maximum width (default is 960px but can be adjusted in your SASS variables file). You can extend this width to 125% of the default by adding a class of `wide`, like so:
  
  ```html
  <div class="wrap wide"> ... </div>
  ```

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>

  <a href="#table-of-contents">⬆ Back to Top</a>
  
- **<a href="#2.2.3">2.2.3 Row</a><a name="user-content-2.2.3"></a>** The `row` wrapper is always nested within the outer `wrap` wrapper. Its purpose is to pull the inner columns to the edges of the outer wrapper by using a negative left/right margin.

  ```html
  <div class="wrap">
      <div class="row"> ... </div>
  </div>
  ```
  
  While `row` does not have any row-specific classes, you may sometimes wish to align content in one row and not another, like so:
  
  ```html
  <div class="wrap">
      <div class="row align-center"> ... </div>
      <div class="row"> ... </div>
  </div>
  ```
  
  The example above uses the `align-center` utility class, which is discussed in <a href="#">Utility Classes</a>.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>

  <a href="#table-of-contents">⬆ Back to Top</a>
  
- **<a href="#2.2.4">2.2.4 Columns</a><a name="user-content-2.2.4"></a>** The final, most versatile piece of the framework are the columns. You can specify any width for your column between 5 and 100 (in increments of 5%) by adding the `width-` class and a number. Two extra widths are also available: `width-33` and `width-66`.

  **Note:** your column widths should always add up to 100, and each row should never have more than 100 in it (otherwise, you may get funky results).

  **Good**
  ```html
  <div class="wrap">
      <div class="row">
          <div class="width-100">
              <h1>The full width column is the most commonly used</h1>
          </div>
      </div>
      <div class="row">
          <div class="width-25">
              <img src="logo.svg">
          </div>
          <div class="width-75">
              <p>But other widths are also ok!</p>
          </div>
      </div>
  </div>
  ```

  **Bad**
  ```html
  <div class="wrap">
      <div class="row">
          <div class="width-50">
              <h2>Fun with half-widths</h2>
          </div>
          <div class="width-50">
              <h2>Fun with half-widths</h2>
          </div>
          <div class="width-25">
              <p>Not a good idea since we now have more than 100% in this row.</p>
          </div>
      </div>
  </div>
  ```
  
  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>

  <a href="#table-of-contents">⬆ Back to Top</a>
  
- **<a href="#2.2.4.1">2.2.4.1 Nesting Columns</a><a name="user-content-2.2.4.1"></a>** There will be times you'll want to have columns within columns. This can be done by adding an extra row inside of your column, then adding columns inside that row.

  **Example**
  ```html
  <div class="wrap">
      <div class="row">
          <div class="width-100">
              <h1>Pirates Arrrr Great</h1>
              
              <div class="row">
                  <div class="width-20">
                      <img src="jolly-roger.png">
                  </div>
                  <div class="width-80">
                      <p>The Jolly Roger is one of the most recognizable flags in the world.</p>
                  </div>
              </div> <!-- // row -->
          </div>
      </div> <!-- // row -->
  </div>
  ```
  
  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>

  <a href="#table-of-contents">⬆ Back to Top</a>
  
- **<a href="#2.2.4.2">2.2.4.2 Responsive</a><a name="user-content-2.2.4.2"></a>** A word of caution to those who want to use what I'll call "non-standard" column widths together. The columns will probably look bad on smaller screens. Presently, the framework only supports responsive for the following column "pairs":

  - 25/75
  - 33/66
  - 50/50

  These are the overwhelming majority of cases, but we may add responsive support for other columns pairs (e.g., 15/85) if required. You can, of course, always add your own rules on a per-project basis. Speaking of responsive...

  <a href="#table-of-contents">⬆ Back to Top</a>
  
## <a name="responsive"></a>Responsive
- **<a href="#3.1">3.1 Naming Conventions for Breakpoints</a><a name="user-content-3.1"></a>** The styleguide currently comes stocked with 8 breakpoints, which are named after U.S. Army ranks. Most of the breakpoints coincide with iOS device widths:
  
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

- **<a href="#3.2">3.2 Range of Breakpoints</a><a name="user-content-3.2"></a>** The upper limit of your breakpoints should be determined by your design. The default upper limit in the styleguide is `general`, which corresponds to 1200px, and the lower limit is `private`, which corresponds to 320px.

  **Note:** While the upper limit can vary, there is not _currently_ any reason to worry about sizes below 320px, though this may change in the near future (durned smartwatches...).

  <a href="#table-of-contents">⬆ Back to Top</a>
  
- **<a href="#3.3">3.3 Special Mixin (rename me)</a><a name="user-content-3.3"></a>** A special mixin called `respond-to` allows you to use the rank naming convention to write your media queries like:

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
  
- **<a href="#3.4">3.4 Placement of Media Queries</a><a name="user-content-3.4"></a>** For placement of responsive style rules (i.e., _Media Queries_), there are three options, which we've given colorful names:

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
  
  _A note on performance:_ The "inline" method can end up creating more selectors when the final CSS file is compiled; however, <a href="http://benfrain.com/inline-or-combined-media-queries-in-sass-fight/">tests have shown</a> that the effect on final file size is negligible.
  
  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#3.5">3.5 Ordering Your Media Queries</a><a name="user-content-3.5"></a>** To ensure that style rules are properly inherited, **breakpoints should always be ordered from largest to smallest.** Otherwise, smaller screens will inherit rules intended for larger screens, and you'll feel compelled to take an early lunch.

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
 
## <a name="boxes"></a>Boxes
- **<a href="#4.1">4.1 Introduction</a><a name="user-content-4.1"></a>** "Boxes" is the creative term given to a stylized box of content. They are primarily used to jazz up an otherwise boring part of the page, and serve well to delineate repeating content, like blog posts.
  
  The markup of the box is important; be sure to follow it closely to reproduce the look in the demos (in other words, it's not as simple as adding `class="box"` to an empty `div`).
  
  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>

  **Behold, an Example**
  ```html
  <article class="box">
  	<h3>What is GoSpotCheck?</h3>
	  <p>GoSpotCheck is enterprise software for field-based teams.</p>
	</article>
	```

  <a href="#table-of-contents">⬆ Back to Top</a>		

- **<a href="#4.2">4.2 Post Box</a><a name="user-content-4.2"></a>** A variation on the theme of box is the "post box", which is intended to showcase blog posts. Drop in the markup below where you need blog posts.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>

  **Example**
	```html
  <article class="post box">
			<div class="width-100 padding-none">
				<figure>
						<a href="#"><img src="box-sample.png"></a>
				</figure>
			</div>
			<div class="width-100 padding">
				<h3><a href="#">An Ode to Small Towns</a></h3>
				<p class="meta">by <a href="#">Sam Adams</a> on September 2, 2015 in <a href="#">Urban Planning</a></p>
				<p>Blog post synopsis goes here, yo.</p>
				<a href="#" class="button outline">Full Article <i class="material-icons">chevron_right</i></a>
			</div>
	</article>
  ```

  **Note:** The example above introduces some new elements, like <a href="#buttons">buttons</a> and <a href="#utility">utility classes</a>.

  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#4.3">4.3 Author Meta Box</a><a name="user-content-4.3"></a>** Another variation on the theme of box is the author meta box, which is intended to showcase an author at the end of a blog post.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  **Example**
  ```html
  <div class="meta box">
  	<div class="width-15 align-center padding-none-right">
  		<img class="round" src="avatar.png">
  	</div>
  	<div class="width-85">
  		<h4>Written by <a href="#">Joey Alfano</a></h4>
  		<p>Joey likes golf and Chipotle</p>
  	</div>
  </div>
  ```

  <a href="#table-of-contents">⬆ Back to Top</a>

## <a name="galleries"></a>Galleries
- **<a href="#5.1">5.1 Introduction</a><a name="user-content-5.1"></a>** Galleries probably require no introduction. They're great for adding a grid of similar content, like a photo gallery or list of related blog posts. You can specify the number of items per row (between 2 and 5) by adjusting the class to be either `gallery-2`, `gallery-3`, `gallery-4`, or `gallery-5`.

	Special thanks to Eric Suzanne, creator of the <a href="http://susy.oddbird.net/">Susy framework</a>, for the basis of this code.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
	**Example**
	```html
	<div class="gallery-3">
		<article>
			<figure>
				<img src="photo-1.jpg">
				<figcaption>I bet you wish you took this photo</figcaption>
			</figure>
			...
		</article>
	</div>
	```
  
  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#5.2">5.2 Captions Outside</a><a name="user-content-5.2"></a>** The example above had captions overlaying the photos. If you don't want this, you can have captions outside (or not at all).

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>

	**Por Ejemplo**
	```html
	<div class="gallery-3">
		<article>
			<figure>
				<div>
					<img src="photo-1.jpg">
				</div>
				<figcaption>I bet you wish you took this photo</figcaption>
			</figure>
			...
		</article>
	</div>
	```
	
  <a href="#table-of-contents">⬆ Back to Top</a>

## <a name="forms"></a>Forms
- **<a href="#6.1">6.1 Introduction</a><a name="user-content-6.1"></a>** Neither forms nor their inputs require any special classes to look good; simply drop in your fields and go. You can easily have side-by-side inputs by using the framework rows and columns.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
	**Example**
	```html
	<form action="" method="post">
		<div class="row">
			<div class="width-50">
				<input name="firstname" placeholder="First name" required type="text">
			</div>
			<div class="width-50">
				<input name="lastname" placeholder="Last name" required type="text">
			</div>
		</div>
		...
	</form>
	```
  
    <a href="#table-of-contents">⬆ Back to Top</a>
## <a name="typography"></a>Typography
- **<a href="#3.1">3.1 Headings</a><a name="user-content-3.1"></a>** GoSpotCheck utilizes `<h1>` to `<h5>` tags. The `<h6>` tag isn’t used because it’s the HTML equivalent of a dewclaw. Generally speaking, each heading should be used as such:

  - `<h1>` Introduces the entire page. There should only be one `<h1>` per page.
  - `<h2>` Introduces a major section of content.
  - `<h3>` Introduces a minor section of content.
  - `<h4>` Usually used stylistically (i.e., because it looks best) and to introduce sidebar sections or minor bits of content.
  - `<h5>` Since a block of text almost never requires this level of detail, the `<h5>` tag is rarely used.

  **Default Styling**  
  - Unless a heading appears on a dark background, it should always be black (`#000`).
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

- **<a href="#3.2">3.2 Body Text</a><a name="user-content-3.2"></a>** Body text includes any non-heading text (e.g., paragraphs and lists).

  **Default Styling**
  - Unless body text appears on a dark background, it should be `#666`.
  - On dark backgrounds, body text should be pure white (`#fff`).  
  - Body text is always set in **Helvetica**. If the user's OS supports it, the ideal font weight is `300` (equivalent to Helvetica Thin).
  
  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>

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

## <a name="animations"></a>CSS Animations
- **<a href="#11.1">11.1 Introduction</a><a name="user-content-11.1"></a>** A whole boatload of CSS animations are built into this framework, ready to use, by simply adding a couple of classes. The great majority of the animations are lifted from Daniel Eden's <a href="https://daneden.github.io/animate.css/">Animate.css</a>. Some of the less-likely-to-be-used animations are stripped out, and other custom animations added in, but the bulk of the _Animate.css_ animations are available.

  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#11.2">11.2 Animations</a><a name="user-content-11.2"></a>** To animate anything, simply add the class `animated` to it, along with one of the following classes, which corresponds to a particular animation:

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
  
  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#11.2">11.2 Looping Animations</a><a name="user-content-11.2"></a>** By default, the animation will run once. You can set it to run endlessly by adding the `infinite` class.

  <a href="https://daneden.github.io/animate.css/"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  **Example**
  ```html
  <h1 class="animated infinite bounce">Infinite Bouncing Header</h1>
  ```

  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#11.3">11.3 Animating on Scroll</a><a name="user-content-11.3"></a>** If you don't want your CSS animation to run right away, you can add a special class, `animate-on-scroll`, to any element, which will cause the animation to be delayed until the element is scrolled into view.

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
  
