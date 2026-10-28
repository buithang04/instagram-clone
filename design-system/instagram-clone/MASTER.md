# Instagram Clone Design System

## Direction

- Content-first social interface inspired by Instagram, with a neutral white/black base and restrained rose/blue accents.
- Use Inter/Figtree-style sans serif typography; avoid decorative body fonts.
- Desktop uses a persistent sidebar. Mobile uses a five-item bottom navigation.
- Media owns the visual hierarchy; surrounding chrome stays quiet and compact.

## Tokens

- Primary: `#E11D48`; interaction blue: `#2563EB`.
- Text: `#0F172A`; muted text: `#64748B`; border: `#E2E8F0`; surface: `#FFFFFF`.
- Radius: 8px controls, 12px cards, full circles for avatars and icon buttons.
- Spacing follows 4/8px increments. Main page gutters: 12px mobile, 20px tablet, 32px desktop.
- Motion: 150–250ms, transform/opacity/color only, disabled under `prefers-reduced-motion`.

## Required behavior

- Text contrast at least 4.5:1 and controls/non-text boundaries at least 3:1.
- Visible focus rings; all icon-only buttons require accessible names.
- Touch targets are at least 44px and primary actions never depend on hover.
- Images reserve aspect ratio, use descriptive alt text, and lazy-load below the fold.
- Test widths: 375, 768, 1024 and 1440px.

## Avoid

- Random shadows, mixed icon weights, emoji as structural icons, gray-on-gray text, layout-shifting animations, and desktop-only navigation.
