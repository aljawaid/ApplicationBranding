<h1 name="user-content-readme-top">ApplicationBranding</h1>
<p align="center">
    <a href="https://github.com/aljawaid/ApplicationBranding/releases">
        <img src="https://img.shields.io/github/v/release/aljawaid/ApplicationBranding?style=for-the-badge&color=brightgreen" alt="GitHub Latest Release (by date)" title="GitHub Latest Release (by date)">
    </a>
    <a href="https://github.com/aljawaid/ApplicationBranding/releases">
        <img src="https://img.shields.io/github/downloads/aljawaid/ApplicationBranding/total?style=for-the-badge&color=orange" alt="GitHub All Releases" title="GitHub All Downloads">
    </a>
    <a href="https://github.com/aljawaid/ApplicationBranding/releases">
        <img src="https://img.shields.io/github/directory-file-count/aljawaid/ApplicationBranding?style=for-the-badge&color=orange" alt="GitHub Repository File Count" title="GitHub Repository File Count">
    </a>
    <a href="https://github.com/aljawaid/ApplicationBranding/releases">
        <img src="https://img.shields.io/github/repo-size/aljawaid/ApplicationBranding?style=for-the-badge&color=orange" alt="GitHub Repository Size" title="GitHub Repository Size">
    </a>
    <a href="https://github.com/aljawaid/ApplicationBranding/releases">
        <img src="https://img.shields.io/github/languages/code-size/aljawaid/ApplicationBranding?style=for-the-badge&color=orange" alt="GitHub Code Size" title="GitHub Code Size">
    </a>
</p>
<p align="center">
    <a href="https://github.com/aljawaid/ApplicationBranding/discussions">
        <img src="https://img.shields.io/github/discussions/aljawaid/ApplicationBranding?style=for-the-badge&color=blue" alt="GitHub Discussions" title="Read Discussions">
    </a>
    <a href="https://github.com/aljawaid/ApplicationBranding/compare">
        <img src="https://img.shields.io/github/commits-since/aljawaid/ApplicationBranding/latest?include_prereleases&style=for-the-badge&color=blue" alt="GitHub Commits Since Last Release" title="GitHub Commits Since Last Release">
    </a>
    <a href="https://github.com/aljawaid/ApplicationBranding/compare">
        <img src="https://img.shields.io/github/commit-activity/m/aljawaid/ApplicationBranding?style=for-the-badge&color=blue" alt="GitHub Commit Monthly Activity" title="GitHub Commit Monthly Activity">
    </a>
    <a href="https://github.com/kanboard/kanboard" title="Kanboard - Kanban Project Management Software">
        <img src="https://img.shields.io/badge/Plugin%20for-kanboard-D40000?style=for-the-badge&labelColor=000000" alt="Kanboard">
    </a>
</p>

This plugin will rename your installation to \'My Workspace\' and include matching device icons in the site metadata for a better user experience. A revamped login page, with a new Admin Dashboard showing global installation activity data with corrected page titles will give a more professional appeal across the site and when sharing links.

<p align="right">[<a href="#user-content-readme-bottom">&#8595; Bottom</a>] [<a href="#screenshots">&#8594; Next</a>] [<a href="#user-content-readme-top">&#8593; Top</a>]</p>

## Features

**Rename Application**
- Rename your installation of Kanboard
  - Choose your own site name or use the default `My Workspace`
  - Browser bookmarks and browser tabs now include the site name (overriding the default Kanboard behaviour)
- [Customizer](https://github.com/creecros/Customizer) Compatibility:
  - Browser bookmarks and browser tabs now include the site name (overriding the default Kanboard behaviour)

**Application Metadata**
- Added both HTML and OpenGraph meta tags
- Added the `meta description` tag to show when sharing links on devices
- 30 Favicons included for all common devices (including Android, Apple, Microsoft, WhatsApp)
  - 26 more favicons than Kanboard!
- Include generic logo in the top left corner of the site (header)
- [Customizer](https://github.com/creecros/Customizer) Compatibility:
  - After installing this plugin, Customizer will also show all 30 favicons
  - Customizer will also use the `meta description`
  - Image must be minimum 300px x 300px for OpenGraph (Meta, WhatsApp) sharing to work correctly

**Site Logo**
- A new 'man on a workdesk' icon is used as the site logo, matching the favicons
- [Customizer](https://github.com/creecros/Customizer) Compatibility:
  - After installing this plugin, Customizer will override the 'man on a workdesk' logo according to the user settings

**Manual Edits**
- Added `domain.com/manual-edits` for easier bookmarks and direct links (if url rewriting is enabled)
- Show a comprehensive list of manual changes required for complete Kanboard rebranding

**New Login Page**
- Show User IP Address
- Show application name and copyright
- Include metadata and generic logo (for when sharing links)
- Show Unsplash random image as background or use plain white
- Faster login switching between users by hovering over the username and password fields
- [Customizer](https://github.com/creecros/Customizer) Compatibility:
  - After installing this plugin, Customizer shows the Custom Note feature retaining its hook (`'template:auth:login-form:newbox'`)

**New Reset Password Page**
- Show User IP Address
- Add user friendly page title
- Show application name and copyright
- Include application metadata and generic logo (for when sharing links)
- Show Unsplash random image as background or use plain white
- Move your mouse over the username and captcha fields to automatically save time selecting the field
- [Customizer](https://github.com/creecros/Customizer) Compatibility:
  - After installing this plugin, Customizer will use the meta tags and page title

**New 2FA Page**
- Show User IP Address
- Add user friendly page title
- Include application metadata and generic logo (for code structure and style consistency)
- A complete revamp of the two factor code check page which shows after login
- Added links to cancel the security check by returning to the login page, unlocking the default login-lock behaviour
- Added `domain.com/security-check` for easier bookmarks and direct links (if url rewriting is enabled)
- Move your mouse over the password field to automatically save time selecting the field

**Reset Password Email**
- Show application name and copyright
- [KanboardEmailHistory](https://github.com/aljawaid/KanboardEmailHistory) Compatibility:
  - The footer of the email shows the new application name and copyright year(s)

**Change Password Page**
- _To be completed_

**New About Page**
- New professional look and feel application dashboard for Admins
  - Add metrics for your Kanboard installation on a global level regardless of projects or tasks
  - Show different types of metrics
  - Show template counts from [TemplateManager](https://github.com/aljawaid/TemplateManager) _(if installed)_
- Add new hook
  - `'template:config:about'` is located before the configuration section
- Include relevant links to Kanboard channels in the revamped _Application Platform_ section
- [KanboardSupport](https://github.com/aljawaid/KanboardSupport) Compatibility:
  - Show button for direct link to detailed configuration

**Custom CSS**
- Add custom styles which load in addition to and after the default custom styles
- Head Stylesheet is loaded after all plugins' styles

<p align="right">[<a href="#user-content-readme-bottom">&#8595; Bottom</a>] [<a href="#features">&#8592; Previous</a>] [<a href="#usage">&#8594; Next</a>] [<a href="#user-content-readme-top">&#8593; Top</a>]</p>

## Screenshots

**Login Page**  

![Login Page](../master/Screenshots/screenshot-login.png "A new user friendly login page")

**2FA Security Check Page**  

![TOTP  Page](../master/Screenshots/screenshot-otp.png "A new user friendly two-factor security check page")

**Reset Password Page**  

![Reset Password Page](../master/Screenshots/screenshot-reset.png "A new user friendly reset password page")

**Page Titles**  

![Page Titles](../master/Screenshots/screenshot-browser-tabs.png "Browser tabs and bookmarks contain the page title")

**Page Titles - _Reset Password_**  

![Reset Password](../master/Screenshots/screenshot-browser-tabs-reset-password.png "Reset password page now includes the page title")

**Settings**  

![Rename Application](../master/Screenshots/screenshot-settings.png "Settings")

**Settings - Metadata**  

![Metadata](../master/Screenshots/screenshot-metadata.png "Metadata")

**Settings - Manual Edits**  

![Manual Edits](../master/Screenshots/screenshot-manual-edits.png "Manual Edits Page")

**About - Admin Dashboard**  

![Admin Dashboard](../master/Screenshots/screenshot-admin-dashboard.png "Admin Dashboard")

**About - Admin Dashboard with TemplateManager**  

![Admin Dashboard with TemplateManager](../master/Screenshots/screenshot-admin-dashboard-icons.png "Admin Dashboard")

<p align="right">[<a href="#user-content-readme-bottom">&#8595; Bottom</a>] [<a href="#features">&#8592; Previous</a>] [<a href="#installation--compatibility">&#8594; Next</a>] [<a href="#user-content-readme-top">&#8593; Top</a>]</p>

## Usage

- The Admin Dashboard is shown in `Settings` &#10562; `About`
- Share the login page, reset password page or a public task. Note the icon and meta information.
- The generic My Workspace icon will show in the top header of the site
- Browser page titles and tabs will be more consistent

<p align="right">[<a href="#user-content-readme-bottom">&#8595; Bottom</a>] [<a href="#screenshots">&#8592; Previous</a>] [<a href="#authors--contributors">&#8594; Next</a>] [<a href="#user-content-readme-top">&#8593; Top</a>]</p>

## Installation & Compatibility

<p align="left">
    <a href="https://github.com/aljawaid/ApplicationBranding/actions/workflows/linter.yml">
        <img src="https://github.com/aljawaid/ApplicationBranding/actions/workflows/linter.yml/badge.svg?branch=master&event=push" alt="Code Scanning" title="View Test">
    </a>
    <a href="https://github.com/aljawaid/ApplicationBranding/actions/workflows/php-compatibility-7.4.yaml">
        <img src="https://github.com/aljawaid/ApplicationBranding/actions/workflows/php-compatibility-7.4.yaml/badge.svg?branch=master&event=push" alt="PHP Compatibility Test" title="View Test">
    </a>
    <a href="https://github.com/aljawaid/ApplicationBranding/actions/workflows/php-compatibility-8.0.yaml">
        <img src="https://github.com/aljawaid/ApplicationBranding/actions/workflows/php-compatibility-8.0.yaml/badge.svg?branch=master&event=push" alt="PHP Compatibility Test" title="View Test">
    </a>
    <a href="https://github.com/aljawaid/ApplicationBranding/actions/workflows/php-compatibility-8.2.yaml">
        <img src="https://github.com/aljawaid/ApplicationBranding/actions/workflows/php-compatibility-8.2.yaml/badge.svg?branch=master&event=push" alt="PHP Compatibility Test" title="View Test">
    </a>
</p>

<details>
    <summary><strong>Installation</strong></summary>

- Install via the **[Kanboard](https://github.com/kanboard/kanboard "Kanboard - Kanban Project Management Software") Plugin Directory** or see [INSTALL.md](../master/INSTALL.md)
- Read the full [**Changelog**](../master/changelog.md "See changes") to see the latest updates

**Content Security Policy - CSP Server Configuration**

If icons or Unsplash images are not displaying you may need to set the CSP on your server. Add the line below in the `.htaccess` file found in the root directory of your Kanboard installation.

```apache
Header set Content-Security-Policy "default-src 'self' 'unsafe-inline'; script-src 'self' 'unsafe-inline' https; connect-src 'self'; img-src 'self' data:; style-src 'unsafe-inline' https *; base-uri 'self'; form-action 'self'; frame-src 'self' https; child-src 'self';"
```

</details>
<details>
    <summary><strong>Compatibility</strong></summary>

- Requires [Kanboard](https://github.com/kanboard/kanboard "Kanboard - Kanban Project Management Software") ≥`1.2.20`
- **Other Plugins & Action Plugins**
  - _No known issues_
  - Compatible with [KanboardEmailHistory](https://github.com/aljawaid/KanboardEmailHistory), [AutomaticActionUX](https://github.com/aljawaid/AutomaticActionUX), [PluginManager](https://github.com/aljawaid/PluginManager), [TagManager](https://github.com/aljawaid/TagManager), [KanboardSupport](https://github.com/aljawaid/KanboardSupport), [Customizer](https://github.com/creecros/Customizer), [TemplateManager](https://github.com/aljawaid/TemplateManager)
- **Core Files & Templates**
  - `08` Template overrides
  - _No database changes_

</details>
<details>
    <summary><strong>Translations</strong></summary>

- English (UK)
- _Starter template available_

</details>

<p align="right">[<a href="#user-content-readme-bottom">&#8595; Bottom</a>] [<a href="#usage">&#8592; Previous</a>] [<a href="#license">&#8594; Next</a>] [<a href="#user-content-readme-top">&#8593; Top</a>]</p>

## Authors & Contributors

- [@aljawaid](https://github.com/aljawaid) - Author
- _Contributors welcome_

<p align="right">[<a href="#user-content-readme-bottom">&#8595; Bottom</a>] [<a href="#installation--compatibility">&#8592; Previous</a>] [<a href="#user-content-readme-top">&#8593; Top</a>]</p>

## License

- This project is distributed under the [MIT License](../master/LICENSE "Read The MIT license")

---

<p align="center">
    <a href="https://github.com/aljawaid/ApplicationBranding/stargazers" title="View Stargazers">
        <img src="https://img.shields.io/github/stars/aljawaid/ApplicationBranding?logo=github&style=flat-square" alt="ApplicationBranding">
    </a>
    <a href="https://github.com/aljawaid/ApplicationBranding/forks" title="See Forks">
        <img src="https://img.shields.io/github/forks/aljawaid/ApplicationBranding?logo=github&style=flat-square" alt="ApplicationBranding">
    </a>
    <a href="https://github.com/aljawaid/ApplicationBranding/blob/master/LICENSE" title="Read License">
        <img src="https://img.shields.io/github/license/aljawaid/ApplicationBranding?style=flat-square" alt="ApplicationBranding">
    </a>
    <a href="https://github.com/aljawaid/ApplicationBranding/issues" title="Open Issues">
        <img src="https://img.shields.io/github/issues-raw/aljawaid/ApplicationBranding?style=flat-square" alt="ApplicationBranding">
    </a>
    <a href="https://github.com/aljawaid/ApplicationBranding/issues?q=is%3Aissue+is%3Aclosed" title="Closed Issues">
        <img src="https://img.shields.io/github/issues-closed/aljawaid/ApplicationBranding?style=flat-square" alt="ApplicationBranding">
    </a>
    <a href="https://github.com/aljawaid/ApplicationBranding/discussions" title="Read Discussions">
        <img src="https://img.shields.io/github/discussions/aljawaid/ApplicationBranding?style=flat-square" alt="ApplicationBranding">
    </a>
    <a href="https://github.com/aljawaid/ApplicationBranding/compare/" title="Latest Commits">
        <img alt="GitHub commits since latest release (by date)" src="https://img.shields.io/github/commits-since/aljawaid/ApplicationBranding/latest?style=flat-square">
    </a>
</p>
<a name="user-content-readme-bottom"></a>
<p align="right">[<a href="#user-content-readme-top">&#8593; Top</a>]</p>
