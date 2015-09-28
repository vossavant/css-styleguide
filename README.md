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
8. [Alert Boxes](#alerts)
9. [Kickers](#kickers)
10. [Lists](#lists)
11. [Tables](#tables)
12. [Pagers](#pagers)
13. [Typography](#typography)
14. [Hyperlinks](#hyperlinks)
15. [Animations](#animations)
16. [Material Icons](#material-icons)
17. [Utility Classes](#utility)

## <a name="best-practices"></a>Best Practices
- **<a href="#1.1">1.1 Indentation<a><a name="user-content-1.1"></a>** Call it a personal preference, but the primary author of this styleguide really adores tabs. The commonly-used double space, when combined with nested SASS selectors, can make it difficult to follow nested selectors. The larger white space of a tab (4 spaces) is preferred.

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

- **<a href="#1.2">1.2 Line Breaks<a><a name="user-content-1.2"></a>** To improve legibility, always add a line break after a comma-separated list of selectors. For legibility's sake, each selector should also be on its own line.

  **Muy Mal**
  ```sass
  h1, h2, h3 { color: red; margin: 0; }
  ```
  
  **Excellente**
  ```sass
  h1,
  h2,
  h3 {
      color: red;
      margin: 0;
  }
  ```
  
  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#1.3">1.3 Order of Selectors<a><a name="user-content-1.3"></a>** When writing good SASS, ordering selectors is of paramount importance. Ordering your selectors gives them a predictable location, thus making them easier to find and saving time. The preferred order of selectors is as follows:

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
  Should always come first, either in alphabetical order (90% of use cases), or in the order they naturally appear in the markup (as with tables, where `thead` comes first in the markup but after `tbody` in the alphabet).
  
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
  - Use common sense and add comments when the purpose of a selector may be unclear
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

- **<a href="#1.6">1.6 Nesting Selectors<a><a name="user-content-1.6"></a>** While SASS allows you to nest your selectors as deep as that trench in _The Abyss_, you should - for the sake of others - limit your nested levels to no more than 4. If you need to nest beyond that, repeat the selector (see example below). This improves legibility and makes code easier to maintain.

	**Horible**
	```sass
	.outer {
		margin: 0;
		
		.inner {
			background: #eee;
			padding: 20px;
			
			&.special {
				display: inherit;
				
				&:first-of-type {
					background: red;
					
					&:hover {
						background: pink;
						
						&:after {
							background: url(arrow.gif);
							content: "";
						}
					}
				}
			}
		}
	}
	```
	
	**Estupendo**
	```sass
	.outer {
		margin: 0;
		
		.inner {
			background: #eee;
			padding: 20px;
			
			&.special {
				display: inherit;
				
				&:first-of-type {
					background: red;
				}
				
				&:first-of-type:hover {
					background: pink;
				}
				
				&:first-of-type:hover:after {
					background: url(arrow.gif);
					content: "";
				}
			}
		}
	}
	```

  <a href="#table-of-contents">⬆ Back to Top</a>
  
- **<a href="#1.7">1.7 Other Best Practices<a><a name="user-content-1.7"></a>** Writing good SASS is also about saving space and being concise where possible. Some other guidelines to follow:

	- Don't include units if the measure is 0 (e.g., `0` vs `0px`)
	- Use shorthand whenever possible (e.g., `margin: 0 0 5px`, `background` vs `background-color`)
	- Use SASS functions whenever possible (e.g., `transparentize($white-100, 0.5)` vs `rgba(255, 255, 255, 0.5)`)
	- Don't repeat browser defaults (e.g., there is no need to set `background-repeat: repeat` unless you are overwriting another rule)
	
	**Bad**
	```sass
	.sunshine {
		background-color: rgba(255, 175, 35, 0.5);
		background-image: url(sunshine.png);
		background-repeat: repeat;
		border: none;
		margin-top: 20px;
		margin-right: 20px;
	}
	```
	
	**Good**
	```sass
	.sunshine {
		background: transparentize($gsc-yellow, 0.5) url(sunshine.png);
		border: 0;
		margin: 20px 20px 0 0;
	}
	```

  <a href="#table-of-contents">⬆ Back to Top</a>
  
## <a name="framework"></a>The Framework
- **<a href="#2.1">2.1 Introduction</a><a name="user-content-2.1"></a>** To ease development, we created our own humble CSS framework. A CSS framework is, at its core, a small set of rules that lets you create columns of content that fit nicely inside a wider parent. Ultimately, this setup allows you to easily create an endless number of layouts.

  The framework is admittedly heavy on `<div>` tags, but no more so than other frameworks (I'm looking at _you_, Bootstrap). Ultimately, the extra `<div>` wrappers end up making it easier to create layouts; even though there is more markup than there would be in a custom layout, there is far less custom CSS.
  
  **Note: The framework is dependent on CSS flexbox, which is incompatible with IE 8/9.**

- **<a href="#2.2">2.2 Anatomy</a><a name="user-content-2.2"></a>** When building layouts with the framework, you will use three types of wrappers:
  
  - The outer wrapper
  - An inner "row" wrapper
  - Column wrappers

  There is an optional fourth "section" wrapper, which lets you create full-width bands of content.
  
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

- **<a href="#2.2.1">2.2.1 Sections</a><a name="user-content-2.2.1"></a>** The outermost wrapper, while not required for the framework to do its thing, is widely used on the current GSC marketing site. Standing alone, this wrapper just adds some top and bottom padding:

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

- **<a href="#2.2.1.1">2.2.1.1 Angled Sections</a><a name="user-content-2.2.1.1"></a>** While somewhat buggy (in some browsers, text within angled sections can appear blurry), this type of section yields some unusual visuals. If you're tired of straight lines, try some angles.

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
  
- **<a href="#2.2.1.3">2.2.1.3 Gradient Section</a><a name="user-content-2.2.1.3"></a>** Creates a section with a subtle gray gradient background. Can also be combined with `class="dark"` to create a dark gradient.

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
  
- **<a href="#2.2.1.4">2.2.1.4 Hero Sections</a><a name="user-content-2.2.1.4"></a>** Creates a hero section. A hero is an introductory section that typically takes up a large portion of the screen, and is used to say "Hey! This is what this page is about!" The default hero takes up the full height of the viewport, but you can specify varying heights (as a % of the viewport):

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

- **<a href="#2.2.1.6">2.2.1.6 Orange Section</a><a name="user-content-2.2.1.6"></a>** Creates a section with an orange background and light text. This name will eventually be changed to `secondary` since orange is the secondary GSC color (after blue).

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
  
  This will center your content and give it a maximum width (the default is `960px` but can be adjusted in your SASS variables file). You can extend this width to 125% of the default by adding a class of `wide`, like so:
  
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
  
  The example above uses the `align-center` utility class, which is discussed in <a href="#utility">Utility Classes</a>.

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

- **<a href="#2.2.4.2">2.2.4.2 Gutters</a><a name="user-content-2.2.4.2"></a>** Rather than have columns butting right up next to each other, the framework provides for some space between them. This space, called the _gutter_, defaults to `20px` and can be adjusted in your SASS variables file.

  <a href="#table-of-contents">⬆ Back to Top</a>
  
- **<a href="#2.2.4.3">2.2.4.3 Responsive</a><a name="user-content-2.2.4.3"></a>** A word of caution to those who want to use what I'll call "non-standard" column widths together. The columns will probably look bad on smaller screens. Presently, the framework only supports responsive for the following column "pairs":

  - 25/75
  - 33/66
  - 50/50

  These are the overwhelming majority of cases, but we may add responsive support for other columns pairs (e.g., 15/85) if required. You can, of course, always add your own rules on a per-project basis. Speaking of responsive...

  <a href="#table-of-contents">⬆ Back to Top</a>
  
## <a name="responsive"></a>Responsive
- **<a href="#3.1">3.1 Naming Conventions for Breakpoints</a><a name="user-content-3.1"></a>** The styleguide currently comes stocked with 8 breakpoints, which follow U.S. Army ranks. Most of the breakpoints coincide with iOS device widths:
  
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
    
  Using U.S. Army ranks _maintains a relationship_ between the breakpoints (i.e., you can tell which breakpoint is larger or smaller than any other breakpoint by knowing your Army ranks). This is more helpful than, say `tablet-large` and `desktop`.
  
  **Note:** If you need to add additional breakpoints, consider adding <a href="http://www.militaryfactory.com/ranks/army_ranks.asp">additional ranks</a>.

  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#3.2">3.2 Range of Breakpoints</a><a name="user-content-3.2"></a>** The upper limit of your breakpoints should be determined by your design. The default upper limit in the styleguide is `general`, which corresponds to `1200px` or 125% of your default content width; the lower limit is `private`, which corresponds to `320px`.

  **Note:** While the upper limit can vary, there is not _currently_ any reason to worry about sizes below 320px, though this may change in the near future (durned smartwatches...).

  <a href="#table-of-contents">⬆ Back to Top</a>
  
- **<a href="#3.3">3.3 The "Respond-to" Mixin</a><a name="user-content-3.3"></a>** A special mixin called `respond-to` allows you to use the Army rank naming convention to write your media queries a bit more concisely. The disadvantage is that it currently only supports `max-width`, so other media queries will need to be written the usual way.

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
  
- **<a href="#3.4">3.4 Placement of Media Queries</a><a name="user-content-3.4"></a>** For placement of responsive style rules (i.e., _Media Queries_), there are three options, which we've given made-up names:

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
  
  **A note on performance:** The "inline" method can end up creating more selectors when the final CSS file is compiled; however, <a href="http://benfrain.com/inline-or-combined-media-queries-in-sass-fight/">tests have shown</a> that the effect on final file size is negligible.
  
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
- **<a href="#4.1">4.1 Introduction</a><a name="user-content-4.1"></a>** "Boxes" is the creative term given to a stylized box of content. They are primarily used to jazz up an otherwise boring part of the page, and serve to better delineate repeating content like blog posts.
  
  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>

  **Behold, an Example**
  ```html
  <article class="box">
  	<h3>What is GoSpotCheck?</h3>
  	<p>GoSpotcheck is enterprise software for field-based teams.</p>
  </article>
	```

  <a href="#table-of-contents">⬆ Back to Top</a>		

- **<a href="#4.2">4.2 Post Box</a><a name="user-content-4.2"></a>** A variation on the theme of _box_ is the "post box", which is intended to showcase blog posts.

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

- **<a href="#4.3">4.3 Author Meta Box</a><a name="user-content-4.3"></a>** Another variation on the theme of _box_ is the author meta box, which is intended to showcase an author at the end of a blog post.

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
- **<a href="#5.1">5.1 Introduction</a><a name="user-content-5.1"></a>** Galleries are great for adding a grid of similar content, like photos or a list of related blog posts. You can specify the number of items per row (between 2 and 5) by adjusting the class to be either `gallery-2`, `gallery-3`, `gallery-4`, or `gallery-5`.

	A special thanks goes to Eric Suzanne, creator of the <a href="http://susy.oddbird.net/">Susy framework</a>, for most of the styles used here.

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

- **<a href="#5.2">5.2 Captions Outside</a><a name="user-content-5.2"></a>** The example above has captions overlaying the photos. If you don't want this, you can have captions outside, or exclude them entirely.

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
  
- **<a href="#6.2">6.2 Best Practices</a><a name="user-content-6.2"></a>** It's easiest to grab the demo code sample and build your form from that; otherwise, be sure to follow these guidelines when adding new fields:

	- If a field has a `label`, the _for_ attribute of the `label` must match the `id` of the field
	- Each field should have a _name_ attribute for use with JavaScript
	- Email fields should be of type _email_ and not of type _text_
	- Be sure to use the `required` attribute to mark <a href="#user-content-6.3">required fields</a>
	- Always include a <a href="#user-content-6.4">honeypot</a> to thwart spambots
  
	<a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#6.3">6.3 Required Fields</a><a name="user-content-6.3"></a>** If a field is required, use the HTML5 `required` flag to trigger browser validation. This will also give special styling to the field in webkit browers.

	It's ok to just type `required` rather than `required="required"` since the former is more concise.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  **Example**
  ```html
  <label for="email">Email Address</label>
  <input id="email" name="email" placeholder="Enter your email" type="email" required>
  ```
  
	<a href="#table-of-contents">⬆ Back to Top</a>
	
- **<a href="#6.4">6.4 Honeypots</a><a name="user-content-6.4"></a>** Spam bots are always out there harvesting emails and filling in forms, sending you useless data. A highly effective way to combat these bots is to include a special field called a **honeypot**. A honeypot is invisible to human users, but spam bots mindlessly fill it in. If this field is filled out, a server side script silently rejects the submission.

	The standard markup for a honeypot is shown below. The only pieces that can't be changed are `class="contact-other"` and `name="other"`; otherwise, feel free to omit the label or add other classes, etc. Place the honeypot code anywhere in your form, as though it were a normal input field.
	
	**Example**
	```html
	<div class="row contact-other">
		<label for="other">Other Comments</label>
		<input id="other" name="other">
	</div>
	```

	By itself, the honeypot does nothing. The magic happens on the server side, where a PHP script checks to see if a field by the name of "other" is filled out. If so, the script silently reject the submission, and the spambot is none the wiser.
  
	<a href="#table-of-contents">⬆ Back to Top</a>
	
- **<a href="#6.5">6.5 Search Forms</a><a name="user-content-6.5"></a>** Easily add a snazzy search form by dropping in the sample code in the example below. The framework looks for a submit button following an input with `type="search"` and styles and positions the input appropriately.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  **Example**
  ```html
  <form action="#" method="post">
  	<input placeholder="Search GoSpotCheck" type="search">
  	<button class="button" type="Submit" value="Search">Go <i class="material-icons">search</i></button>
  </form>
  ```
  
	<a href="#table-of-contents">⬆ Back to Top</a>

## <a name="buttons"></a>Buttons
- **<a href="#7.1">7.1 General Use</a><a name="user-content-7.1"></a>** Buttons, or calls to action (CTAs) should be used sparingly (no more than one per section). Their purpose is to attract attention and compel the visitor to take action. Avoid having buttons adjacent to each other, as this can confuse the user.

	Either `<a>` or `<button>` is acceptable. The general rule here is that you should use `<button>` if there is no logical destination for the `<a>`. In other words, if there is no _href_ attribute for the `<a>`, use a `<button>`.

	**Basic Button**
	```html
	<a class="button" href="landing-page.php">Learn More</a>
	```

  <a href="#table-of-contents">⬆ Back to Top</a>
  
- **<a href="#7.2">7.2 Types of Buttons</a><a name="user-content-7.2"></a>** There are more buttons than you can shake a selfie stick at; check the demo page for all of 'em. Here's a complete list of class names you can use; the most commonly used ones are in **bold**:

	- **clear**
	- **dark**
	- disabled
	- gradient
	- large
	- **light**
	- outline
	- **secondary**
	- shadow
	- small
	- text-shadow

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  **Note:** you can also combine multiple styles; here is an extreme example:
  ```html
  <a class="button large secondary gradient" href="landing-page.php">Start Today</a>
  ```
  
  <a href="#table-of-contents">⬆ Back to Top</a>

## <a name="alerts"></a>Alert Boxes
- **<a href="#8.1">8.1 General Use</a><a name="user-content-8.1"></a>** Alert boxes are limited in scope on the GSC marketing site, but are more widespread in the web application. Their purpose is to alert the user to an event, or to the state of the page.

	Alert boxes should be `<p>` unless a special case warrants otherwise. Use common sense when adding alert boxes; rare is the case when more than one is needed on screen at once.

  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#8.2">8.2 Types of Alerts</a><a name="user-content-8.2"></a>** There are five general "states" that would warrant an alert box:

	- **Normal** (a subtle FYI)
	- **Info** (a more obvious heads up)
	- **Success** (something went well)
	- **Warning** (something could go wrong)
	- **Error** (something went poorly)

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  **Examples**
  ```html
  <p class="message">Hey, I'm a boring ol' message.</p>
  <p class="message info">Be sure to enter your email to receive our special offers.</p>
  <p class="message success">Thanks, your message is on its way.</p>
  <p class="message warning">Our site will be down this weekend for routine maintenance.</p>
  <p class="message error">There was a problem saving your data.</p>
  ```
  
	<a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#8.3">8.3 Persistent Alerts</a><a name="user-content-8.3"></a>** Alerts are hidden by default, then shown when needed with a little bit of JavaScript. You can have an alert persist (always show) by adding `class="visible"`.

	**Example**
	```html
	<p class="message info visible">Be sure to enter your email to receive our special offers</p>
	```
  
	<a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#8.4">8.4 Other Styles</a><a name="user-content-8.4"></a>** Alerts are not only hidden, but also quite plain by default. Jazz 'em up by adding one of four classes:

	- gradient
	- icon
	- no-border
	- rounded

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  **Example**
	```html
	<p class="message gradient">I have a subtle gradient background</p>
	<p class="message info icon">I have a snazzy info icon to the left</p>
	<p class="message no-border">I don't have any border</p>
	<p class="message rounded">I have rounded edges</p>
	<p class="message no-border rounded gradient">I am so totally jazzed up</p>
	```
	
	<a href="#table-of-contents">⬆ Back to Top</a>

## <a name="kickers"></a>Kickers
- **<a href="#9.1">9.1 Introduction</a><a name="user-content-9.1"></a>** A **kicker** is a promotional CTA that appears in the bottom right of the viewport when a user scrolls to a point on the page. The idea is to appeal to visitors once they're nearing the end of a page, and compel them to further explore the site.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  **Example**
  ```html
	<div data-animation="fadeIn" id="kicker">
		<span class="close">
			<i class="material-icons">clear</i>
		</span>
		<img src="kicker.jpg">
		<h3>1,000,000 Mission Responses!</h3>
		<p>We just reached one million mission responses!</p>
		<a class="fancybox fancybox.iframe button secondary" href="#">Watch Video</a>
	</div>
  ```
	<a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#9.2">9.2 Persistent Kicker</a><a name="user-content-9.2"></a>** A kicker is hidden at first and appears, via JavaScript, once the user hits a certain scroll point. You can have the kicker always appear by removing the `data-animation` attribute.

	**Example**
	```html
	<!-- always visible -->
	<div id="kicker"> ... </div>
	
	<!-- fades in -->
	<div data-animation="fadeIn" id="kicker"> ... </div>
	```

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>

	<a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#9.3">9.3 Animated Kicker</a><a name="user-content-9.3"></a>** You can animate your kicker by using any of the <a href="#user-content-15.2">supported animations</a>. Add the animation name you want to use as a `data-animation` attribute to your kicker.

	**NOTE: This feature is buggy and still under development.**

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
	<a href="#table-of-contents">⬆ Back to Top</a>

## <a name="lists"></a>Lists
- **<a href="#10.1">10.1 Types of Lists</a><a name="user-content-10.1"></a>** Default lists are bulleted and have a bit of indentation, but are otherwise tragically un-sexy. Dress up your lists with one of three classes:

	- bulleted
	- icon
	- stacked

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  **Example**
  ```html
  <ul class="stacked">
  	<li>Goats make delicious cheese</li>
  	<li>Technically, they make delicious milk</li>
  	<li>Which is then turned into delicious cheese</li>
  </ul>
  ```
  
	<a href="#table-of-contents">⬆ Back to Top</a>

## <a name="tables"></a>Tables
- **<a href="#11.1">11.1 Best Practices</a><a name="user-content-11.1"></a>** Tables are a great way to show lots of data in an easy-to-digest format. They're used extensively on the web app, but very little on the marketing site. When creating a table, be sure to follow these rules:

	- Never use a `<table>` for laying out a page
	- Always include the `<thead>` and `<tbody>` elements
	- Use `<th>` instead of `<td>` in the `<thead>`
	- Use `<th>` instead of `<td>` in the first cell of a row in the `<tbody>`
	- Keep columns to a minimum (preferably less than 7)

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  **Example**
  ```html
  <table>
  	<thead>
  		<tr>
  			<th>Rank</th>
  			<th>Name</th>
  			<th>Points</th>
  		</tr>
  	</thead>
  	<tbody>
  		<tr>
  			<th>1</th>
  			<td>Batman</td>
  			<td>1,308</td>
  		</tr>
  		...
  	</tbody>
  </table>
  ```
  
	<a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#11.2">11.2 Table with Fixed Header</a><a name="user-content-11.2"></a>** For all but the smallest tables, you'll probably want a header that doesn't scroll with the page. A fixed header makes it easier to read the data and know what columns are what.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  **Example**
  ```html
  <div class="fixed-table-wrap">
  	<div class="header-bg"></div>
  		<div class="inner">
  			<table>
  				<thead>
  					<tr>
  						<th><span>Rank</span></th>
  						<th><span>Name</span></th>
  						<th><span>Points</span></th>
  					</tr>
  				</thead>
  				<tbody>
  					...
  ```
  
	<a href="#table-of-contents">⬆ Back to Top</a>

## <a name="pagers"></a>Pagers
- **<a href="#12.1">12.1 Previous / Next Pager</a><a name="user-content-12.1"></a>** Most commonly used on the marketing site (specifically, within the blog) to navigate between pages of blog posts. Aesthetically, they are identical to buttons, but rely instead on a default WordPress class for styling.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  **Example**
  ```html
  <div class="post-links">
		<a href="#">
			<i class="material-icons left">chevron_left</i> Older 
		</a>
		<a href="#">
			<i class="material-icons">chevron_right</i> Newer
		</a>
	</div>
  ```
  
	<a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#12.2">12.2 Hero / Carousel Pager</a><a name="user-content-12.2"></a>** Used primarily in the hero section on the marketing site (currently, to navigate between features).

	**Example**
	```html
	<div class="width-100">
		<h3>Sample Pager Section</h3>
		<p>Nothing to see here, just filling in empty space.</p>
		<a class="arrow-nav prev" href="#">
			<i class="material-icons">chevron_left</i>
		</a>
		<div class="width-50">
			<img src="filler.jpg">
		</div>
		<a class="arrow-nav next" href="#">
			<i class="material-icons">chevron_right</i>
		</a>
	</div> <!-- // width-100 -->
	```

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
	<a href="#table-of-contents">⬆ Back to Top</a>

## <a name="typography"></a>Typography
- **<a href="#13.1">13.1 Headings</a><a name="user-content-13.1"></a>** GoSpotCheck utilizes `<h1>` to `<h5>` tags. The `<h6>` tag isn’t used because it’s the HTML equivalent of a dewclaw. Generally speaking, each heading should be used as such:

  - `<h1>` Introduces the entire page (there should only be one `<h1>` per page)
  - `<h2>` Introduces a major section of content
  - `<h3>` Introduces a minor section of content
  - `<h4>` Introduces sidebar sections or minor bits of content
  - `<h5>` Rarely used

  **Default Styling**  
  - Unless a heading appears on a dark background, it should always be black (`#000`)
  - On dark backgrounds, headings should be pure white (`#fff`)
  - Headings should always be set in **Gotham**
  
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

- **<a href="#13.2">13.2 Body Text</a><a name="user-content-13.2"></a>** Body text includes any non-heading text (e.g., paragraphs and lists).

  **Default Styling**
  - Unless body text appears on a dark background, it should be `#666`
  - On dark backgrounds, body text should be pure white (`#fff`)
  - Body text should always be set in **Helvetica** with a weight of `300`
  
  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>

<a href="#table-of-contents">⬆ Back to Top</a>

## <a name="hyperlinks"></a>Hyperlinks
- **<a href="#14.1">14.1 Linked Text</a><a name="user-content-14.1"></a>** A link should make sense by itself; i.e., if you could only see the link text and didn't have context, you could guess where the link would take you.

  **Bad** _(standing alone, the linked text is vague)_
  ```html
  <p>For more information, visit Samantha Holloway's <a href="...">LinkedIn page</a>.</p>
  ```
  
  **Good** _(standing alone, the linked text tells us where the links goes)_
  ```html
  <p>For more information, visit <a href="...">Samantha Holloway's LinkedIn page</a>.</p>
  ```
  <a href="#table-of-contents">⬆ Back to Top</a>
  
- **<a href="#14.2">14.2 Styling</a><a name="user-content-14.2"></a>** In general, links should be **bold** and colored GSC Blue (`#00bdff`). On hover, links should darken to GSC Dark Blue (`#0097d4`) and be underlined, or otherwise have some visible change that clearly indicates the text is a clickable link.

	These guidelines can be adjusted ad hoc; e.g., sometimes you want to link a header, and it would look better to leave the header a dark color. This is fine, provided there is a clear hover effect. When in doubt, remember that it's best to only link things that users would expect to be linked (titles to blog posts, for instance).

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>

  <a href="#table-of-contents">⬆ Back to Top</a>
  
- **<a href="#14.3">14.3 Opening in a New Tab</a><a name="user-content-14.3"></a>** With few exceptions, **a link should never open in a new tab**. This behavior takes control away from the user, which is usually not a good idea. There are two allowed exceptions:
  
  - When linking directly to a file (which is almost never applicable, since modern browsers handle file downloads)
  - When following the link would interrupt an ongoing process (e.g., linking to the privacy policy inside of a lightbox where a user is completing a form)
  
  To open a link a new tab, simply add `target="_blank"` to your anchor tag; the CSS will take care of the rest and add a visual indicator that the link will open elsewhere:
  
  ```html
  <p>For sarcastic remarks, <a href="..." target="_blank">send Chris Kampfe an email</a>.</p>
  ```
  
  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>

  <a href="#table-of-contents">⬆ Back to Top</a>

## <a name="animations"></a>Animations
- **<a href="#15.1">15.1 Introduction</a><a name="user-content-15.1"></a>** A whole boatload of ready-to-use CSS animations are built into this framework. The great majority of the animations are lifted from <a href="https://daneden.github.io/animate.css/">Daniel Eden's Animate.css</a>. Some of the less-likely-to-be-used animations are stripped out, and other custom animations added in, but the bulk of the _Animate.css_ animations are available.

  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#15.2">15.2 Animations</a><a name="user-content-15.2"></a>** To animate anything, simply add two classes to it: `animated`, plus one of the following:

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

  <a href="https://daneden.github.io/animate.css/"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#15.3">15.3 Looping Animations</a><a name="user-content-15.3"></a>** By default, an animation will run once. You can set it to run endlessly by adding the `infinite` class.

  <a href="https://daneden.github.io/animate.css/"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  **Example**
  ```html
  <h1 class="animated infinite bounce">Infinite Bouncing Header</h1>
  ```

  <a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#15.4">15.4 Animating on Scroll</a><a name="user-content-15.4"></a>** If you don't want your CSS animation to run right away, you can add a special class, `animate-on-scroll`, to any element. This will cause the animation to be delayed until the element is scrolled into view (with the help of JavaScript, of course).

  <a href="https://daneden.github.io/animate.css/"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
  **Specifying Animations**  
  The element to be animated should _not_ have the `animated` class on it; this is added by JavaScript when the element is scrolled into view. You _will_, however, need to add a `data-animation` attribute, specifying which animation to run. The animation should be set to one of the animation names <a href="#15.2">listed above</a>.
  
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
  
## <a name="material-icons"></a>Material Icons
- **<a href="#16.1">16.1 Introduction</a><a name="user-content-16.1"></a>** With the introduction of this framework, we moved away from Font Awesome to <a href="https://www.google.com/design/icons/">Google's Material Icon font</a>. The reason was twofold: (1) we prefer the aesthetic and (2) the markup is more semantic. 
	One downside to the Material Icon set is its lack of support for social media, which means you'll need to load any social media icons separately.

	<a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#16.2">16.2 Implementation</a><a name="user-content-16.2"></a>** You can add an icon practically anywhere with a short bit of code. The wrapper need not be an `<i>` tag, but that is the standard. The icon font relies on the `material-icons` class to load up the base styles, and then uses jiggery pokery (i.e., <a href="http://google.github.io/material-design-icons/#using-the-icons-in-html">_ligatures_</a>) to convert the text within the `<i>` tags to a glyph.

  <a href="https://daneden.github.io/animate.css/"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
	**First, Load the Styles**
	```html
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	```
	
	**Then, Add an Icon**
	```html
	<i class="material-icons">chevron_right</i>
	```
	
	You can see a complete list of icons by visiting the <a href="https://www.google.com/design/icons/">Material Icons page</a>. If an icon name is more than one word, be sure to replace spaces with underscores, as in the example above.

	<a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#16.3">16.3 Further Styling</a><a name="user-content-16.3"></a>** You can further style your icons by taking advantage of additional classes that come bundled with the default icon stylesheet. Visit the <a href="http://google.github.io/material-design-icons/">Google Material Icons docs</a> for an exhaustive overview. 

	**Examples**
	```html
	<!-- changes icon size to 18px (default is 24px) -->
	<i class="material-icons md-18">face</i>
	
	<!-- darkens icon (for use on light background -->
	<i class="material-icons md-dark">face</i>
	
	<!-- lightens icon (for use on dark background -->
	<i class="material-icons md-light">face</i>
	
	<!-- fades icon, so it appears disabled -->
	<i class="material-icons md-dark md-inactive">face</i>
	```

<a href="#table-of-contents">⬆ Back to Top</a>

## <a name="utility"></a>Utility Classes
- **<a href="#17.1">17.1 Utility Classes</a><a name="user-content-17.1"></a>** This framework comes with a handful of "utility" classes that can be applied pretty much anywhere to add a bit of extra ad hoc styling. Here is a current list:

	- <a href="#17.1.1">align-bottom</a>
	- <a href="#17.1.2">align-center</a>
	- <a href="#17.1.3">align-left</a>
	- <a href="#17.1.4">align-middle</a>
	- <a href="#17.1.5">align-right</a>
	- <a href="#17.1.6">align-top</a>
	- <a href="#17.1.7">bg-cover</a>
	- <a href="#17.1.8">caps</a>
	- <a href="#17.1.9">caption</a>
	- <a href="#17.1.10">flex</a>
	- <a href="#17.1.11">float-right</a>
	- <a href="#17.1.12">hidden</a>
	- <a href="#17.1.13">intro-p</a>
	- <a href="#17.1.14">light-text</a>
	- <a href="#17.1.15">relative</a>
	- <a href="#17.1.16">subtitle</a>
	- <a href="#17.1.17">visible</a>

- **<a href="#17.1.1">17.1.1 Align Bottom</a><a name="user-content-17.1.1"></a>** Applies only to a flexbox (i.e., a container with `display: flex`). Aligns child content to the bottom of the parent.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
	<a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#17.1.2">17.1.2 Align Center</a><a name="user-content-17.1.2"></a>** Aligns content (including images) to the center.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
	<a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#17.1.3">17.1.3 Align Left</a><a name="user-content-17.1.3"></a>** This class has two applications: (1) for normal containers, aligns content to the left; (2) for flexbox containers such as `<div class="row">`, pulls child elements to the left (by default, if children of a flexbox don't take up the full width of the parent, they will stretch to fill the space).

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
	<a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#17.1.4">17.1.4 Align Middle</a><a name="user-content-17.1.4"></a>** Applies only to a flexbox. Aligns child content to the middle of the parent (i.e., vertical alignment).

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
	<a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#17.1.5">17.1.5 Align Right</a><a name="user-content-17.1.5"></a>** Just like `align-left`, this class has two applications: (1) for normal containers, aligns content to the right; (2) for flexbox containers such as `<div class="row">`, pulls child elements to the right.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
	<a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#17.1.6">17.1.6 Align Top</a><a name="user-content-17.1.6"></a>** Applies only to a flexbox (i.e., a container with `display: flex`). Aligns child content to the top of the parent.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
	<a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#17.1.7">17.1.7 Background Cover</a><a name="user-content-17.1.7"></a>** Gives an element `background-size: cover`.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
	<a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#17.1.8">17.1.8 Capitalize</a><a name="user-content-17.1.8"></a>** Capitalizes text within an element.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
	<a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#17.1.9">17.1.9 Caption</a><a name="user-content-17.1.9"></a>** Italicizes and lightly grays text within an element, to mimic a photo caption.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
	<a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#17.1.10">17.1.10 Flex</a><a name="user-content-17.1.10"></a>** Gives an element `display: flex`. Rarely needed, but occasionally very helpful.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
	<a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#17.1.11">17.1.11 Float Right</a><a name="user-content-17.1.11"></a>** Floats an element to the right.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
	<a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#17.1.12">17.1.12 Hidden</a><a name="user-content-17.1.12"></a>** Hides an element by giving it `display: none`. Opposite of <a href="#17.1.17">visible</a>.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
	<a href="#table-of-contents">⬆ Back to Top</a>
	
- **<a href="#17.1.13">17.1.13 Intro Paragraph</a><a name="user-content-17.1.13"></a>** Gives the first paragraph within an element a larger font-size.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
	<a href="#table-of-contents">⬆ Back to Top</a>
	
- **<a href="#17.1.14">17.1.14 Light Text</a><a name="user-content-17.1.14"></a>** Changes the text color of an element to white. When applied to a parent element, changes the text color of headings and paragraphs within to white, and adds a subtle text shadow.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
	<a href="#table-of-contents">⬆ Back to Top</a>
	
- **<a href="#17.1.15">17.1.15 Relative Positioning</a><a name="user-content-17.1.15"></a>** Gives an element `position: relative`.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
	<a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#17.1.16">17.1.16 Subtitle</a><a name="user-content-17.1.16"></a>** Enlarges the font of an element. Useful for giving visual emphasis to a paragraph following a main heading.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
	<a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#17.1.17">17.1.17 Visible</a><a name="user-content-17.1.17"></a>** Shows an element by giving it `display: inherit`. Opposite of <a href="#17.1.12">hidden</a>.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
	<a href="#table-of-contents">⬆ Back to Top</a>

- **<a href="#17.2">17.2 Additional Spacing</a><a name="user-content-17.2"></a>** In addition to the utility classes above, the framework includes a number of special "spacing" classes that allow you to apply incremental amounts of margin and padding to any element. There are also some classes that remove margin and padding from elements that have them by default.

  <a href="http://gospotcheck.com/link-to-demo"><img height="17" src="http://www.gospotcheck.com/images/github-demo-button.png" title="See it in action"></a>
  
	While this will be changed in the next version to be more sensible, for now, the base unit is twice the <a href="#2.2.4.2">gutter width</a> (instead of equal to it). That is, `margin-top` will apply `margin-top: 40px`, while `margin-half-top` will apply `margin-top: 20px`.
	
	**Apply the Gutter Width to Any Element**
	- margin-half-bottom
	- margin-half-left
	- margin-half-right
	- margin-half-top
	- padding-half-bottom
	- padding-half-left
	- padding-half-right
	- padding-half-top  

	**Apply Twice the Gutter Width to Any Element**
	- margin-bottom
	- margin-left
	- margin-right
	- margin-top
	- padding-bottom
	- padding-left
	- padding-right
	- padding-top  

	**Apply 4x the Gutter Width to Any Element**
	- margin-double-bottom
	- margin-double-left
	- margin-double-right
	- margin-double-top
	- padding-double-bottom
	- padding-double-left
	- padding-double-right
	- padding-double-top  

	**Remove Spacing From Any Element**
	- margin-none
	- margin-none-bottom
	- margin-none-left
	- margin-none-right
	- margin-none-top
	- padding-none
	- padding-none-bottom
	- padding-none-left
	- padding-none-right
	- padding-none-top  

	**Example**
	```html
	<div class="padding-double-top margin-none-right">...</div>
	```

	<a href="#table-of-contents">⬆ Back to Top</a>
