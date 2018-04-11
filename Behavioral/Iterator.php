<?php

/**
 * Interface ProfileIterator
 * Generic Interface for all Iterators
 */
interface ProfileIterator
{
    public function getNext();
    public function hasMore();
}

/**
 * Class FacebookIterator
 * Concrete Iterator
 */
class FacebookIterator implements ProfileIterator
{
    private $facebookCollection;

    public function __construct(FacebookCollection $facebookCollection, $profileId, $type)
    {
        $this->facebookCollection = $facebookCollection;
    }

    public function getNext()
    {
        // custom for facebook getNext implementation
    }

    public function hasMore()
    {
        // custom for facebook hasMore implementation
    }
}

/**
 * Interface SocialNetworkCollection
 * Collection interface with factory methods for Iterators
 */
interface SocialNetworkCollection
{
    /**
     * @param $profileId
     * @return ProfileIterator
     */
    public function createFriendsIterator($profileId);

    /**
     * @param $profileId
     * @return ProfileIterator
     */
    public function createCoworkersIterator($profileId);
}

/**
 * Class FacebookCollection
 * Concrete collection
 */
class FacebookCollection implements SocialNetworkCollection
{
    public function createFriendsIterator($profileId)
    {
        return new FacebookIterator($this, $profileId, "friends");
    }

    public function createCoworkersIterator($profileId)
    {
        return new FacebookIterator($this, $profileId, "coworkers");
    }
}

/**
 * Class LinkedinCollection
 * Concrete collection
 */
class LinkedinCollection implements SocialNetworkCollection
{
    public function createFriendsIterator($profileId)
    {
        // todo: linkedin iterator
    }

    public function createCoworkersIterator($profileId)
    {
        // todo: linkedin iterator
    }
}

/**
 * Class SocialSpammer
 * Sender Client
 */
class SocialSpammer
{
    public static function send(ProfileIterator $iterator, $message)
    {
        while ($iterator->hasMore()) {
            $profile = $iterator->getNext();
//            sendEmailTo($profile->getEmail(), $message);
        }
    }
}

$workWithFacebook = true;
$collection = $collection ? new FacebookCollection() : new LinkedinCollection();

SocialSpammer::send($collection->createFriendsIterator(123), "Why did you say about my friends?");
SocialSpammer::send($collection->createCoworkersIterator(123), "What did you say about my coworkers?");
