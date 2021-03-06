<h2>Accept Friend Request</h2>

<?php if ($this->error('code', 'invalidOrOffline')): ?>
  <p><span class="error">Unable to reach your friend's plog. It may be offline.</span></p>
<?php endif ?>
<?php if ($this->error('code', 'rejected')): ?>
  <p><span class="error">Sorry, your friend's plog rejected the code. It may be too old or they may have revoked it.</span></p>
<?php endif ?>

<p>
  Feel free to edit your friend's nickname as you see fit (especially if it conflicts with another friend). Then click Accept Friend Request.
</p>
<form method="POST" action="<?php echo $this->get('actionUrl') ?>">
  <input type="hidden" name="csrf" value="<?php echo $data['csrf'] ?>" />
  <input type="hidden" name="code" value="<?php echo $data['code'] ?>" />
  <ul>
    <li>
      <label for="first_name">First Name</label><input type="text" name="first_name" value="<?php echo $data['first_name'] ?>"/>
    </li>
    <li>
      <label for="last_name">Last Name</label><input type="text" name="last_name" value="<?php echo $data['last_name'] ?>"/>
    </li>
    <li>
      <label for="nickname">Nickname</label><input type="text" name="nickname" value="<?php echo $data['nickname'] ?>"/>
      <?php if ($this->error('nickname', 'required')): ?>
        <span class="error">Required.</span>
      <?php endif ?>
      <?php if ($this->error('nickname', 'unique')): ?>
        <span class="error">Must be unique among your friends.</span>
      <?php endif ?>
    </li>
    <li>
      <input class="submit" type="submit" value="Accept Friend Request" /> <a class="cancel" href="<?php echo $data['cancelUrl'] ?>">Cancel</a>
    </li>
  </ul>
</form>