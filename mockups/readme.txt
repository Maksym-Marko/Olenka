Olenka — Design Mockups
=======================

This folder holds design references used to build and modify Olenka pages
and Gutenberg blocks. Put your mockups here as:

  - PNG / JPG images
  - HTML files
  - other design reference files (PDF, Figma exports, etc.)

How to use these files
-----------------------

- These are REFERENCE MATERIAL ONLY. They are not production theme files and
  must never be shipped or served as frontend output.
- When implementing a mockup, inspect it first and break it into logical
  sections and reusable components.
- Check the existing blocks in src/blocks/ before building anything new.
  Reuse or extend an existing block where it fits; create a new block only
  when the design needs a component that isn't already well represented.
- Not every visual element needs its own block. Block boundaries should map to
  meaningful, maintainable, reusable content components.
- Make content a WordPress editor would reasonably change editable through
  Gutenberg (attributes, RichText, InnerBlocks) instead of hardcoding it.
- Follow the Olenka architecture and conventions in CLAUDE.md. Treat the mockup
  as the visual reference and the existing codebase as the implementation
  architecture.

Task-specific requirements (page details, validation criteria) will be given in
the task prompt when a mockup is implemented.
