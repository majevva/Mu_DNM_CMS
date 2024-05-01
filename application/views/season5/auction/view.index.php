<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo _('Auction'); ?></h1>
        </div>
        <div class="box-style1" style="margin-bottom: 20px;">
            <h2 class="title"><?php echo _('Sell & Buy Characters'); ?></h2>

            <div class="entry">
                <div style="float:right;">
                    <a class="custom_button" href="<?php echo $this->config->base_url; ?>auction/my-bets">My Bets</a>
                    <a class="custom_button" href="<?php echo $this->config->base_url; ?>auction/my-characters">My Characters</a>
                    <a class="custom_button" href="<?php echo $this->config->base_url; ?>auction/add-lot">Add Lot</a>
                </div>
                <div style="padding-top:40px;">
                    <?php if(!$auction_chars): ?>
                        <div class="i_note"><?php echo _('Currently no auctions on this server.'); ?></div>
                        <?php
                    else:
                        ?>
                        <table class="ranking-table">
                            <thead>
                            <tr class="main-tr">
                                <th style="text-align:center;">Seller</th>
                                <th style="text-align:center;">Character</th>
                                <th style="text-align:center;">Starting Bid</th>
                                <th style="text-align:center;">Last Bid</th>
                                <th style="text-align:center;" class="end">Auction End Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach($auction_chars as $auction):
                                    $auction['last_bid'] = ($auction['last_bid'] != NULL) ? $auction['last_bid'] . ' ' . $this->website->translate_credits($this->config->config_entry('auction_' . $this->session->userdata(['user' => 'server']) . '|char_sell_price_type'), $this->session->userdata(['user' => 'server'])) : 'No Bids';
                                    echo '<tr>
									<td>' . $auction['seller_acc'] . '</td>
									<td><a href="' . $this->config->base_url . 'auction/character/' . bin2hex($auction['char_name']) . '/' . $this->session->userdata(['user' => 'server']) . '">' . $auction['char_name'] . '</a></td>
									<td>' . $auction['starting_bid'] . ' ' . $this->website->translate_credits($this->config->config_entry('auction_' . $this->session->userdata(['user' => 'server']) . '|char_sell_price_type'), $this->session->userdata(['user' => 'server'])) . '</td>
									<td>' . $auction['last_bid'] . '</td>
									<td>' . date('d M Y, h:i', $auction['auction_end_time']) . '</td>
								</tr>';
                                endforeach;
                            ?>
                            </tbody>
                        </table>
                        <?php
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>
	