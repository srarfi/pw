const form = document.querySelector('form');

        form.addEventListener('submit', (event) => {
            event.preventDefault(); // Prevent the form from submitting normally
            const usernameInput = document.querySelector('input[name="user"]');
            const postInput = document.querySelector('input[name="post"]');

            // Get the values from the form
            const userValue = usernameInput.value;
            const postValue = postInput.value;

            // Append the values to the URL
            const redirectUrl = `forum.php?user=${userValue}&post=${postValue}`;

            // Redirect to the verification.php page with the appended values
            window.location.href = redirectUrl;
        });
/*
function banUser(username) {
  let bannedUsers = JSON.parse(localStorage.getItem('bannedUsers')) || [];
  if (!bannedUsers.includes(username)) {
    bannedUsers.push(username);
    localStorage.setItem('bannedUsers', JSON.stringify(bannedUsers));
    alert(`User '${username}' has been banned.`);
    displayUsers();
  } else {
    alert(`User '${username}' is already banned.`);
  }
}

function isUserBanned(username) {
  let bannedUsers = JSON.parse(localStorage.getItem('bannedUsers')) || [];
  return bannedUsers.includes(username);
}

function deletePost(postId) {
  let posts = JSON.parse(localStorage.getItem('posts')) || [];
  posts = posts.filter(post => post.id !== postId);

  localStorage.setItem('posts', JSON.stringify(posts));
  displayPosts();
}

function deleteComment(postId, commentIndex) {
  let posts = JSON.parse(localStorage.getItem('posts')) || [];
  const post = posts.find(p => p.id === postId);

  if (post && post.comments.length > commentIndex) {
    post.comments.splice(commentIndex, 1);
    localStorage.setItem('posts', JSON.stringify(posts));
    displayPosts();
  }
}

function displayUsers() {
  const usersContainer = document.getElementById('users');
  usersContainer.innerHTML = '';

  let users = JSON.parse(localStorage.getItem('users')) || [];

  users.forEach(user => {
    const userElement = document.createElement('div');
    userElement.classList.add('user-container');
    userElement.style.border = '1px solid #ccc';
    userElement.style.borderRadius = '10px';
    userElement.style.padding = '10px';
    userElement.style.marginBottom = '10px';
    userElement.style.boxShadow = '0 2px 4px rgba(0, 0, 0, 0.1)';
    userElement.style.position = 'relative';

    const banButton = document.createElement('button');
    banButton.classList.add('button', 'button-red');
    banButton.innerText = 'Ban User';
    banButton.onclick = function() {
      if (confirm(`Are you sure you want to ban '${user.username}'?`)) {
        banUser(user.username);
      }
    };

    userElement.innerHTML = `
      <h2>${user.username}</h2>
    `;

    userElement.appendChild(banButton);
    usersContainer.appendChild(userElement);
  });
}

function displayPosts() {
  const postsContainer = document.getElementById('posts');
  postsContainer.innerHTML = '';

  let posts = JSON.parse(localStorage.getItem('posts')) || [];

  posts.forEach(post => {
    const postElement = document.createElement('div');
    postElement.classList.add('post-container');
    postElement.style.border = '1px solid #ccc';
    postElement.style.borderRadius = '10px';
    postElement.style.padding = '20px';
    postElement.style.marginBottom = '20px';
    postElement.style.boxShadow = '0 2px 4px rgba(0, 0, 0, 0.1)';
    postElement.style.position = 'relative';

    const adminControls = document.createElement('div');
    adminControls.classList.add('admin-controls');
    adminControls.innerHTML = `
      <button class="button button-red" onclick="deletePost(${post.id})">Delete Post</button>
      <button class="button button-blue" onclick="banUser('${post.author}')">Ban User</button>
    `;

    const postContent = document.createElement('div');
    postContent.classList.add('post-content');
    postContent.innerHTML = `
      <h2>Post by ${post.author}</h2>
      <p>${post.content}</p>
    `;

    const commentsList = document.createElement('ul');
    commentsList.classList.add('comments');
    commentsList.id = `comments-${post.id}`;

    const commentInputs = document.createElement('div');
    commentInputs.classList.add('comment-inputs');
    commentInputs.innerHTML = `
      <input type="text" id="commentAuthor-${post.id}" placeholder="Your username">
      <textarea id="commentContent-${post.id}" placeholder="Your comment"></textarea>
      <button class="button button-blue" onclick="submitComment(${post.id})">Submit Comment</button>
    `;

    post.comments.forEach((comment, index) => {
      const commentElement = document.createElement('li');
      commentElement.classList.add('comment');
      commentElement.style.border = '1px solid #ccc';
      commentElement.style.borderRadius = '10px';
      commentElement.style.padding = '10px';
      commentElement.style.marginBottom = '10px';
      commentElement.style.boxShadow = '0 2px 4px rgba(0, 0, 0, 0.1)';
      commentElement.innerHTML = `
        <div class="comment-content">
          <h3>Comment by ${comment.author}</h3>
          <p>${comment.content}</p>
          <div class="admin-controls">
            <button class="button button-red" onclick="deleteComment(${post.id}, ${index})">Delete Comment</button>
            <button class="button button-blue" onclick="banUser('${comment.author}')">Ban User</button>
          </div>
        </div>
      `;
      commentsList.appendChild(commentElement);
    });

    postElement.appendChild(adminControls);
    postElement.appendChild(postContent);
    postElement.appendChild(commentsList);
    postElement.appendChild(commentInputs);
    postsContainer.appendChild(postElement);
  });
}

function toggleCommentInputs(postId) {
  const commentInputs = document.querySelector(`#comment-inputs-${postId}`);
  if (commentInputs) {
    commentInputs.style.display = (commentInputs.style.display === 'none' || !commentInputs.style.display) ? 'block' : 'none';
  }
}

function submitComment(postId) {
  const authorInput = document.getElementById(`commentAuthor-${postId}`);
  const contentInput = document.getElementById(`commentContent-${postId}`);
  const author = authorInput.value;
  const content = contentInput.value;

  if (!author || !content) {
    alert('Please provide both username and comment content.');
    return;
  }

  const posts = JSON.parse(localStorage.getItem('posts')) || [];
  const post = posts.find(p => p.id === postId);

  if (post) {
    post.comments.push({ author, content });
    localStorage.setItem('posts', JSON.stringify(posts));
    displayPosts();
    authorInput.value = '';
    contentInput.value = '';
    toggleCommentInputs(postId);
  }
}

function submitPost() {
  const authorInput = document.getElementById('postAuthor');
  const contentInput = document.getElementById('postContent');
  const author = authorInput.value;
  const content = contentInput.value;

  if (!author || !content) {
    alert('Please provide both username and post content.');
    return;
  }

  const posts = JSON.parse(localStorage.getItem('posts')) || [];
  const postId = posts.length > 0 ? Math.max(...posts.map(post => post.id)) + 1 : 1;
  posts.push({ id: postId, author, content, comments: [] });

  localStorage.setItem('posts', JSON.stringify(posts));
  displayPosts();
  authorInput.value = '';
  contentInput.value = '';
}

// Initialize users (you can replace this with your own user initialization logic)
const initialUsers = [
  { username: 'admin' },
  { username: 'user1' },
  { username: 'user2' }
];

localStorage.setItem('users', JSON.stringify(initialUsers));

displayPosts();
*/