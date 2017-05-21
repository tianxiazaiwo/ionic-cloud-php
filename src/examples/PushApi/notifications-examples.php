<?
use Tomloprod\IonicCloud\Exception\RequestException;
use Tomloprod\IonicCloud\IonicCloudApi;

$ionicProfile = "yourIonicProfile";
$IonicCloudToken = "youtIonicCloudToken";

$ionicCloudApi = new IonicCloudApi($ionicProfile, $IonicCloudToken);
?>

<h1>List all notifications and get data:</h1>

<ul>
    <?
    try {

        $response = $ionicCloudApi->push->notifications->paginatedList([
            'page_size' => 10,
            'page' => 1
        ]);

        foreach($response->data as $notification) {
            ?>
            <li>
                <p><b>Notification ID:</b> <?= $notification['uuid']; ?> </p>
                <p><b>Title:</b> <?= $notification['config']['notification']['title']; ?> </p>
                <p><b>Message:</b> <?= $notification['config']['notification']['message']; ?> </p>
                <p><b>Created at:</b> <?= $notification['created']; ?> </p>
            </li>
            <?
        }

    } catch(RequestException $e) {
        // Three ways to do the same thing:
        ?><li>Error! Code: <?= $e->getCode() ?> | Message: <?= $e->getMessage()?> | Link: <?= $e->getLink() ?></li><?
        ?><li><?=$e->prettify()?></li><?
        ?><li><?=$e?></li><?
    }
    ?>
</ul>

<hr/>

<h1>Retrieve notification by uuid:</h1>

<ul>
    <?
    try {

        $response = $ionicCloudApi->push->notifications->retrieve("e5aaf...");

        ?>
        <li>
            <p><b>Notification ID:</b> <?= $response->data['uuid']; ?> </p>
            <p><b>Title:</b> <?= $response->data['config']['notification']['title']; ?> </p>
            <p><b>Message:</b> <?= $response->data['config']['notification']['message']; ?> </p>
            <p><b>Created at:</b> <?= $response->data['created']; ?> </p>
        </li>
        <?

    } catch(RequestException $e) {
        // Three ways to do the same thing:
        ?><li>Error! Code: <?= $e->getCode() ?> | Message: <?= $e->getMessage()?> | Link: <?= $e->getLink() ?></li><?
        ?><li><?=$e->prettify()?></li><?
        ?><li><?=$e?></li><?
    }
    ?>
</ul>

<hr/>
