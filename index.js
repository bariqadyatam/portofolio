// ---
const hamMenuBtn = document.querySelector('.header__main-ham-menu-cont')
const smallMenu = document.querySelector('.header__sm-menu')
const headerHamMenuBtn = document.querySelector('.header__main-ham-menu')
const headerHamMenuCloseBtn = document.querySelector(
  '.header__main-ham-menu-close'
)
const headerSmallMenuLinks = document.querySelectorAll('.header__sm-menu-link')

hamMenuBtn.addEventListener('click', () => {
  if (smallMenu.classList.contains('header__sm-menu--active')) {
    smallMenu.classList.remove('header__sm-menu--active')
  } else {
    smallMenu.classList.add('header__sm-menu--active')
  }
  if (headerHamMenuBtn.classList.contains('d-none')) {
    headerHamMenuBtn.classList.remove('d-none')
    headerHamMenuCloseBtn.classList.add('d-none')
  } else {
    headerHamMenuBtn.classList.add('d-none')
    headerHamMenuCloseBtn.classList.remove('d-none')
  }
})

for (let i = 0; i < headerSmallMenuLinks.length; i++) {
  headerSmallMenuLinks[i].addEventListener('click', () => {
    smallMenu.classList.remove('header__sm-menu--active')
    headerHamMenuBtn.classList.remove('d-none')
    headerHamMenuCloseBtn.classList.add('d-none')
  })
}

// ---
const headerLogoConatiner = document.querySelector('.header__logo-container')

headerLogoConatiner.addEventListener('click', () => {
  location.href = 'index.html'
})

// --- Contact Form Discord Webhook
const contactForm = document.getElementById('contactForm')

if (contactForm) {
  contactForm.addEventListener('submit', async function (e) {
    e.preventDefault()

    const name = document.getElementById('name').value
    const email = document.getElementById('email').value
    const message = document.getElementById('message').value

    const webhookURL = 'https://discord.com/api/webhooks/1511541616815378432/oWrlv-UlL97mjUO7wdHh8_vU6X0cnjqGeh5td_ZZPl18k_pZy76JPpv7BhLE9GmW9rqA'

    const payload = {
      embeds: [
        {
          title: '📩 Pesan Baru dari Portfolio',
          color: 3447003,
          fields: [
            {
              name: '👤 Nama',
              value: name,
            },
            {
              name: '📧 Email',
              value: email,
            },
            {
              name: '💬 Pesan',
              value: message,
            },
          ],
          timestamp: new Date().toISOString(),
        },
      ],
    }

    try {
      await fetch(webhookURL, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(payload),
      })

      alert('Pesan berhasil dikirim!')
      contactForm.reset()
    } catch (error) {
      console.error(error)
      alert('Gagal mengirim pesan.')
    }
  })
}